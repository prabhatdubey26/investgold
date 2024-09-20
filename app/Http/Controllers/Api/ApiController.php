<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    // get employee list

public function employee_list(Request $request)
{
    try {
        $employees = User::all();

        return response()->json(['status' => 1, 'message' => 'Employees List successfully', 'data' => $employees], 200);
    } catch (\Exception $e) {
        return response()->json(['status' => 0, 'message' => 'An error occurred', 'error' => $e->getMessage()], 500);
    }
}

//Create api to emp details
public function employee_details($id)
{
   
    try {
       
        $employees = User::join('user_details', 'users.id', '=', 'user_details.user_id')
        ->select('users.id','users.name','users.email','user_details.address','user_details.phone_number'
        ,'user_details.education','user_details.created_at','users.updated_at')    
            ->where('users.id', $id)
            ->first();
            if(!empty($employees)){   
        return response()->json(['status' => 1, 'message' => 'Employees Details successfully', 'data' => $employees]);
        }else{
            return response()->json(['status' => 0, 'message' => 'Data Not Found', 'data' => null]);    
        }
    } catch (\Exception $e) {
        return response()->json(['status' => 0, 'message' => 'An error occurred', 'error' => $e->getMessage()], 500);
    }
}

public function updateEmployee(Request $request, $emp_id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'email' => 'nullable|email',
        'address' => 'required',
        'phone_number' => 'required|max:10',
        'education' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['status' => 0, 'message' => 'Validation Error', 'errors' => $validator->errors()], 422);
    }

    // Update the employee record and the related userDetails record
    try {
        $user = User::with('userDetails')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('users.id','users.name','users.email','user_details.address','user_details.phone_number','user_details.education')    
            ->findOrFail($emp_id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update the related userDetails record
        $user->userDetails->update([
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'education' => $request->education,
        ]);

        return response()->json(['status' => 1, 'message' => 'Employee record and related details updated successfully']);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json(['status' => 0, 'message' => 'Employee not found'], 404);
    } catch (\Exception $e) {
        return response()->json(['status' => 0, 'message' => 'An error occurred', 'error' => $e->getMessage()], 500);
    }
}

        public function destroy($id)
        {
            $user = User::with('userDetails')->find($id);

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            // Delete related user details
            if ($user->userDetails) {
                $user->userDetails->delete();
            }

            // Delete the user
            $user->delete();

            return response()->json(['message' => 'User and related details deleted successfully']);
        }


        // weather api search city only

        public function search(Request $request)
{
    // Validate the input
    $request->validate([
        'city' => 'required|string|max:255',
    ]);

    $city = $request->input('city');

    try {
        // Make the API request
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'q' => $city,
            'appid' => '49c0bad2c7458f1c76bec9654081a661',
            'units' => 'metric', 
        ]);

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['main']['temp'])) {
                $temperature['name']        = $data['name'];
                $temperature['country']     = $data['sys']['country'];
                $temperature['temperature'] = $data['main']['temp'];
                $temperature['Weather']     = $data['weather'][0]['description'];
                return response()->json(['status' => 1, 'message' => 'Weather details successfully','temperature' => $temperature], 200);
            } else {
                return response()->json(['error' => 'Invalid API response format: Temperature not found'], 500);
            }
        } else {
            return response()->json(['error' => 'API request failed', 'status' => $response->status()]);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'API request failed: ' . $e->getMessage()], 500);
    }
}

}

