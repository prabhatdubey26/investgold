<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\KYC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF; 

class KycListController extends Controller
{

    public function userDetail() 
    {
        $userData = User::where('role',2)->paginate(10);
        return view('userDetail', compact('userData'));
    }
        public function kyc_list($id)
        {
            $kycs = Kyc::where('user_id',$id)
            ->join('users', 'kycs.user_id', '=', 'users.id')
            ->select('kycs.*', 'users.name','users.kyc_status')
            ->get();
            
            return view('kyc_list', compact('kycs'));
        }
    
        public function updateUser(Request $request)
    {
        $userId = $request->input('editId');
        $user = User::find($userId);
        $user->name = $request->input('editName');
        $user->email = $request->input('editEmail');
        $user->phone = $request->input('editPhone');
        $user->bank_name = $request->input('editBankName');
        $user->bank_id = $request->input('editBankId');
        $user->account_no = $request->input('editAccountNo');
        $user->address = $request->input('editAddress');
        $user->save();

        // Return response (optional)
        return response()->json(['message' => 'User details updated successfully']);
    }
// Delete user details
    public function deleteUserDetail(Request $request)
    {
        $userId = $request->input('userId');
     
      User::where('id', $userId)->delete();
      return response()->json(['message' => 'User detail deleted successfully']);
    }


    public function updateOrder(Request $request)
    {
        $order = json_decode($request->input('order'), true);

        foreach ($order as $position => $employeeId) {
            // Update the position in the database
            User::where('id', $employeeId)->update(['position' => $position + 1]);
        }

        return response()->json(['success' => true]);
    }

    public function downloadPDF($id)
    {
        $item = User::find($id);
        if (!$item) {
            abort(404, 'Item not found');
        }

        $pdf = PDF::loadView('myPDF', compact('item'));

        return $pdf->download('item.pdf');
    }


public function updateKycStatus(Request $request)
{
    $userId = $request->input('user_id');
    $status = $request->input('kyc_status');
    $comment = $request->input('comment');

    $user = User::find($userId);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }
    // Update the KYC status and comment
    $user->kyc_status = $status;
    if ($status == 2) { 
        $user->comment = $comment; 
    }else{
        $user->comment = ""; 
    }
    $user->save();

    return response()->json(['message' => 'KYC status updated successfully']);
}


}
