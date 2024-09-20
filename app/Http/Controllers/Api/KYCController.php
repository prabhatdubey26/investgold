<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KYC;
use App\Models\User;
use App\Models\KYCDocument;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Validation\ValidationException;


class KYCController extends Controller
{
    public function store(Request $request)
{
    
    try {
        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:kycs,email',
            'image' => 'required|file|mimes:jpeg,png', // Ensure photo is a file of type JPEG or PNG
            
        ]);
      
        // Check if the email exists in the users table
        $user = User::where('email', $validatedData['email'])->first();

        if (!$user) {
            throw new \Exception("User with provided email does not exist.");
        }
        // Handle photo upload
        if ($request->hasFile('image')) {
           
            $photoFile_image = $request->file('image');
            $photoNameImage = $this->uploadFile($photoFile_image, 'image');
          
        } else {
            throw new \Exception("Selfi is required.");
        }

        // Store KYC data in the database
        $kyc = KYC::create([
            'user_id' => $user->id,
            'image' => $photoNameImage,
            'email' => $validatedData['email'],
            'status' => 1,
        ]);
        $kyc->image = asset('image/' . $kyc->image)??'';

        // Return success response
        return response()->json(['status' => true, 'message' => 'Add Selfi submitted successfully', 'kyc' => $kyc],200);

    } catch (\Exception $e) {
        // Handle exceptions
        return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
    }
}

private function uploadFile($file, $directory)
{
    // Define the upload directory
    $uploadDirectory = public_path($directory);

    // Ensure the upload directory exists; if not, create it
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // Generate a unique name for the file
    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

    // Move the uploaded file to the upload directory
    $file->move($uploadDirectory, $fileName);

    return $fileName;
}


public function show($id)
{
    try {
        // Find the KYC record by ID
        $kycRecord = KYC::where('id',$id)->get();
        
        foreach ($kycRecord as $document) {
            
            $document->image  = asset('image/' . $document->image);
            $document->photo  = asset('photos/' . $document->photo);
            $document->backphoto = asset('documents/' . $document->backphoto);
            
        }

        // Add document paths to the response
        $response = [
            'status' => true,
            'message' => 'KYC Record retrieved successfully',
            'kyc_record' => $kycRecord,
        ];
        return response()->json($response, 200);
    } catch (\Exception $e) {
        // Handle exceptions
        return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
    }
}


public function update(Request $request)
{
    try {
        // Validate the request data
        $validatedData = $request->validate([
            'type' => 'required',
            'photo' => 'required|file|mimes:jpeg,png', 
            'email' => 'required',
            'backphoto' => 'required|file|mimes:jpeg,png'
        ]);
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photoFile = $request->file('photo');
            $photoName = $this->uploadFile($photoFile, 'photos');
        } else {
            throw new \Exception("Photo is required.");
        }

        // Handle photo upload
        if ($request->hasFile('backphoto')) {
            $photoFile1 = $request->file('backphoto');
            $photoName1 = $this->uploadFile($photoFile1, 'documents');
        } else {
            throw new \Exception("Back Photo is required.");
        }

    $kyc = KYC::where('email', $validatedData['email'])->first();

    if ($kyc) {
        $kyc->update([
            'type' => $validatedData['type'],
            'photo' => $photoName,
            'backphoto' => $photoName1,
        ]);
       
        $kyc->image  = asset('image/' . $kyc->image)??'';
        $kyc->photo  = asset('photos/' . $kyc->photo)??'';
        $kyc->backphoto = asset('documents/' . $kyc->backphoto)??'';

        return response()->json(['status' => true, 'message' => 'KYC Updated successfully', 'kyc' => $kyc],200);
    }else {
            // KYC record with provided email does not exist
            return response()->json(['message' => 'KYC record with provided email not found'], 404);
        }
    } catch (\Exception $e) {
        // Handle exceptions
        return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
    }
}

public function update_selfi(Request $request, $id)
{
    try {
        // Validate the request data
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle photo upload
        if ($request->hasFile('image')) {
            $photoFileImage = $request->file('image');
            $photoNameImage = $this->uploadFile($photoFileImage, 'image');
            //$photoNameImage = time() . '_' . $photoFileImage->getClientOriginalName();
            //$photoFileImage->move(public_path('images'), $photoNameImage);
        } else {
            return response()->json(['status' => false, 'message' => 'Selfie is required.'], 400);
        }
        
       

        // Find the KYC record by user ID
        $kyc = KYC::where('user_id', $id)->first();
        if (!$kyc) {
            return response()->json(['status' => false, 'message' => 'KYC record not found.'], 404);
        }

        // Update KYC data in the database
        $kyc->update([
            'image' => $photoNameImage,
            'status' => 1,
        ]);

        // Update user KYC status
        User::where('id', $id)->update(['kyc_status' => 1]);

        // Return success response
        return response()->json(['status' => true, 'message' => 'Selfie updated successfully', 'kyc' => $kyc], 200);

    } catch (\Exception $e) {
        // Handle exceptions
        return response()->json(['status' => false, 'message' => 'An error occurred', 'error' => $e->getMessage()], 500);
    }
}


}