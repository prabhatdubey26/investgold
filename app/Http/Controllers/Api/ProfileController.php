<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
   public function profile_update(Request $request, $id)
   {
     try {

        // Validate the request data
        $validatedData = $request->validate([
            'phone' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'bank_id' => 'required|string|max:255',
            'account_no' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update user information
        $user->phone = $validatedData['phone'];
        $user->bank_name = $validatedData['bank_name'];
        $user->bank_id = $validatedData['bank_id'];
        $user->account_no = $validatedData['account_no'];
        $user->address = $validatedData['address'];
        $user->save();

        // Return success response
        return response()->json(['status' => true, 'message' => 'Profile updated successfully', 'user' => $user], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
    }
}

public function profile_list($id)
{
    try {
        $user = User::leftjoin('kycs', 'users.id', '=', 'kycs.user_id')
        ->where('users.id', $id)
        ->select('users.*', 'kycs.image')
        ->firstOrFail();
        $user->image  = asset('image/' . $user->image)??'';
        return response()->json(['status' => true, 'user' => $user], 200);
    } catch (\Exception $e) {
        // Handle exceptions
        return response()->json(['message' => 'User not found', 'error' => $e->getMessage()], 404);
    }
}


}
