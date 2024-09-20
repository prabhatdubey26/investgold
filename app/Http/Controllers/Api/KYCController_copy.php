<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KYC;
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
                'name' => 'required|string|max:255',
                'photo' => 'required|string',
                'phone' => 'required|string|max:20',
                'email' => 'required|string|email|max:255|unique:kycs,email',
                'documents' => 'required|array',
                'documents.*' => 'required|string',
            ]);
    
            // Decode and store the photo
            if ($request->has('photo')) {
                $upload_directory = storage_path('app/public/photos');
              
                if (!File::isDirectory($upload_directory)) {
                    File::makeDirectory($upload_directory, $mode = 0777, true, true);
                }
                $base64Photo = $request->photo; 
                $parts = explode(',', $base64Photo);
                $image_data = base64_decode($parts[1]);
                $mime_type = explode(';', $parts[0])[0];
                switch ($mime_type) {
                    case 'data:image/jpeg':
                        $extension = '.jpg';
                        break;
                    case 'data:image/png':
                        $extension = '.png';
                        break;
                    default:
                        return response()->json(['status' => false, 'message' => "Unsupported photo format."]);
                }
     
                $photo_name = strtolower(Str::random(20)) . $extension;
                file_put_contents($upload_directory . '/' . $photo_name, $image_data);
            }
    
            // Store KYC data in the database
            $kyc = KYC::create([
                'user_id' => $request->user()->id,
                'name' => $validatedData['name'],
                'photo' => 'storage/photos/' . $photo_name,
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
            ]);
    
            // Process and store the documents
            $documentNames = [];
            foreach ($validatedData['documents'] as $document) {
                $upload_directory = storage_path('app/public/documents');
                if (!File::isDirectory($upload_directory)) {
                    File::makeDirectory($upload_directory, $mode = 0777, true, true);
                }
                $base64Document = $document; 
                $parts = explode(',', $base64Document);
                $file_data = base64_decode($parts[1]);
                $mime_type = explode(';', $parts[0])[0];
                switch ($mime_type) {
                    case 'data:image/jpeg':
                        $extension = '.jpg';
                        break;
                    case 'data:image/png':
                        $extension = '.png';
                        break;
                    case 'data:application/pdf':
                        $extension = '.pdf';
                        break;
                    default:
                        return response()->json(['status' => false, 'message' => "Unsupported document format."]);
                }
                $document_name = 'document_' . time() . '_' . uniqid() . $extension;
                file_put_contents($upload_directory . '/' . $document_name, $file_data);
    
                // Store document information in the kyc_documents table
                KYCDocument::create([
                    'kyc_id' => $kyc->id,
                    'file_name' => $document_name,
                ]);
    
                $documentNames[] = $document_name;
            }
    
            // Return success response
            return response()->json(['status' => true, 'message' => 'KYC submitted successfully', 'kyc' => $kyc]);
    
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }
    

    public function show($id)
{
    try {
        $kycRecord = KYC::with('kyc_documents')->findOrFail($id);
        foreach ($kycRecord->kyc_documents as $document) {
          
           
            $document->url = Storage::url('documents/' . $document->file_name);
            
        }

        return response()->json(['status' => true,'message' => 'KYC List successfully', 'kyc_record' => $kycRecord]);
    } catch (\Exception $e) {
        return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
    }

}
}