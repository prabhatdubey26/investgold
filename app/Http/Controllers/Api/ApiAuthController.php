<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class ApiAuthController extends Controller
{
    public function register(Request $request)
{
    try {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8'
        ]);

            $user = new User();
            $user->role = 2;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
          
           
        if ($user) {
            // Get the newly created user from the database
            $user = User::findOrFail($user->id);
             
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => true,
                    'message' => 'User registered successfully',
                    'user' => $user  // Include user details in the response
                ], 200);
            }
        }
    } catch (\Exception $e) {
        // Handle other exceptions
        return response()->json([
            'status' => false,
            'message' => 'Error occurred while registering user',
            'error' => $e->getMessage()
        ], 500);
    }
}


    public function login(Request $request)
{
    $fields = $request->validate([
        'email' => 'required|string',
        'password' => 'required|string',
    ]);

    // Check email
    $user = User::where('email', $fields['email'])->first();
    if (!$user || !Hash::check($fields['password'], $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    $abilities = ['view-dashboard', 'create-post', 'edit-post'];
    $exp_date =now()->addDays(1);
    // Create a new API token with abilities and an expiration date (e.g., 1 day)
    $token = $user->createToken('myapptoken', [
        'expires_at' => $exp_date,
        'abilities' => $abilities,
    ]);

    
    $response = [
        'staut' => true,
        'message' => 'Login successfully',
        'user' => $user,
        'token' => $token->plainTextToken, 
        'abilities' => $abilities,
        'expires_at' => $exp_date
    ];

    // Return a success response with a 201 status code
    return response()->json($response, 201);

   }

   public function logout(Request $request)
        {
            // Revoke the current user's token
            $request->user()->tokens()->delete();

            return response()->json(['message' => 'Logged out successfully']);
        }
}
