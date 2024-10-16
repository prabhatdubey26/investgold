<?php

namespace App\Http\Controllers;

use App\Models\KYC;
use App\Models\User;
use App\Models\Order;
use App\Models\Header;
use App\Models\News;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Razorpay\Api\Api;
use App\Models\WalletTrasaction;
use App\Notifications\ResetPasswordNotification;

class UserController extends Controller
{
    public function submitForm(Request $request)
{
 
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required',
        //'uimg' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'type' => ['required', Rule::in(['1', '2', '3'])], // Assuming type can be one of 1, 2, or 3
        'doc1' => 'required|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048',
        'doc2' => 'required|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048',
    ]);

    $user = User::create([
        'role' => 2,
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    
    // if ($request->hasFile('uimg')) {
           
        // $photoFile_image = $request->file('uimg');
        // $photoNameImage = $this->uploadFile($photoFile_image, 'image');
      
    // } else {
        // throw new \Exception("Selfi is required.");
    // }
    if ($request->hasFile('doc1')) {
        $photoFile = $request->file('doc1');
        $photoName = $this->uploadFile($photoFile, 'photos');
    } else {
        throw new \Exception("Photo is required.");
    }

    // Handle photo upload
    if ($request->hasFile('doc2')) {
        $photoFile1 = $request->file('doc2');
        $photoName1 = $this->uploadFile($photoFile1, 'documents');
    } else {
        throw new \Exception("Back Photo is required.");
    }
    $kyc = Kyc::create([
        'user_id' => $user->id,
        'type' => $request->type,
        'email' => $request->email,
        //'image' => $photoNameImage,
        'photo' => $photoName,
        'backphoto' => $photoName1,
    ]);
    return response()->json(['message' => 'Form submitted successfully']);
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
  
            public function userLogin(Request $request)
            {
               
                $credentials = $request->only('email', 'password');
                
                $user = User::where('email', $credentials['email'])->where('role',2)->first();
                
                if (!$user || !Hash::check($credentials['password'], $user->password)) {
                    
                    return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
                }

                // Authentication passed
                Auth::login($user);
                session(['user_id' => $user->id,'user_name' => $user->name,'user_email' => $user->email]);

                return redirect('/');

            }

    
    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        // Invalidate the session and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); 
    }

    public function dashboard($id)
    {
        $user = User::findOrFail($id);
        $orders = Order::where('user_id', $user->id)->get();

        $goldOrderCount = 0;
        $silverOrderCount = 0;
        
        foreach ($orders as $order) {
            $productDetails = json_decode($order->product_details, true); // Decode the JSON
        
            // Check if product details exist
            if ($productDetails) {
                foreach ($productDetails as $product) {
                    // Check the summary to count gold and silver
                    if (isset($product['summary'])) {
                        if ($product['summary'] === 'gold') {
                            $goldOrderCount++;
                        } elseif ($product['summary'] === 'silver') {
                            $silverOrderCount++;
                        }
                    }
                }
            }
        }
        $trasCount = WalletTrasaction::where('user_id',$user->id)->count();
        return view('user.dashboard', compact('user', 'goldOrderCount', 'silverOrderCount','trasCount'));
    }
    
    public function profile()
    {
        $user = User::with('kyc')->findOrFail(Auth::id());
        return view('user.profile',compact('user'));
    }

    public function changePassword()
    {
        $user = User::findOrFail(Auth::id());
        $layout = 'user';
        if($user->role==1){
            $orders = Order::paginate(10);
            $layout = 'auth';
        }
        return view('user.change-password',compact('user','layout'));
    }

    public function resetPassword(Request $request)
    {
        $navigations = Header::all();
        $team = Team::all();
        $news = News::all();
        $user = User::where('remember_token', $request->token)->first();
        if(!$user){
            abort(404);
        }
        return view('user.reset', compact('user','navigations','team','news'));
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);
        // Find the user by email
        $user = User::where('email', $request->email)->first();
        
        if ($user) {
            // Generate a password reset token
            $token = \Str::random(60); // You might want to use Laravel's built-in token generation
            $user->remember_token = $token;
            $user->save();
            // Send the password reset notification
            $user->notify(new ResetPasswordNotification($token));
           // Redirect with a success message
        return redirect()->back()->with('success', 'Password reset link has been sent to your email.');
    }

    // Redirect with an alert message
    return redirect()->back()->with('alert', 'Email not found. Please try again.');
        
    }


    public function updateResetPassword(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'new_password' => 'required|min:6|confirmed', // Changed to 'confirmed'
        ]);
        // Retrieve the currently authenticated user
        $user = User::where('remember_token', $request->token)->first();
       
        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->remember_token = '';
        $user->save();
        return redirect('/')->with('success', 'Password changed successfully!');
    }

    public function updatePassword(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'new_password' => 'required|min:6|confirmed', // Changed to 'confirmed'
        ]);
        // Retrieve the currently authenticated user
        $user = User::findOrFail(Auth::id());
       
        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.change-password')->with('success', 'Password changed successfully!');
    }

    



     public function bankDetails()
    {
        $bankDetails = Auth::user();
        return view('user.bank-details', compact('bankDetails'));
    }
    
    public function updateBank()
    {
        $user = Auth::user();
        return view('user.update-bank-details', compact('user'));
    }

    public function wallet()
    {
        $wallet = Auth::user();
        return view('user.wallet', compact('wallet'));
    }

    public function addWallet(Request $request){
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                // Fetch the payment from Razorpay
                $payment = $api->payment->fetch($input['razorpay_payment_id']);
                // Ensure the captured amount matches the authorized amount
                $fee = $payment['fee']; // Razorpay fee
                $authorizedAmount = $payment['amount']; 
                $amountToCapture = $authorizedAmount - $fee;
                $user_id = Auth()->user()->id;
                // Check if the payment is authorized
                if ($payment['status'] === 'authorized') {
                    $response = $payment->capture(['amount' => $amountToCapture]);
                    $json = [
                        'amount' => $response['amount'] / 100, // Convert to INR
                        'fee' => $response['fee'] / 100, // Convert fee to INR
                        'tax' => $response['tax'] / 100, 
                        'r_payment_id' => $response['id'],
                    ];
               
                  
                $user = User::where('id',$user_id)->first();
                
                $walletT = WalletTrasaction::create([
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'payment_status' => $response['status'],
                    'json_response' => json_encode($json),
                    'user_id' => $user_id,
                    'transaction_type' => 'credit',
                    'amount' => $input['amount'], // Ensure this is validated before
                    'remarks' => 'Add Money to Wallet'
                ]);
                
                    $user->wallet += $input['amount'];
                    $user->save();
                
                    return redirect()->back()->with("Amount Added Sucessfully in your Wallet.");
                } 
            } catch (Exception $e) {
                return redirect()->back()->withErrors(['message' => $e->getMessage()]);
            }
        } else {
            return redirect()->back();
        }
    }

    public function showTransactions()
    {
        $userId = Auth()->user()->id;
        $transactions = WalletTrasaction::where('user_id', $userId)->paginate(20);

        return view('user.transactions', compact('transactions'));
    }


    public function updateBankDetails(Request $request)
    {
        $user = Auth::user();
        $user->phone = $request->input('phone');
        $user->bank_name = $request->input('bank_name');
        $user->bank_id = $request->input('bank_id');
        $user->account_no = $request->input('account_no');
        $user->address = $request->input('address');

        $user->save();

        return redirect()->route('user.update-bank-details')->with('success', 'Bank details updated successfully');
    }

    public function updateProfile(Request $request)
{
    $user = Auth::user();

    // Update profile image if provided
    if ($request->hasFile('image')) {
        $profileImage = $request->file('image');
        $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
        $profileImage->move(public_path('image'), $imageName);
        
        // Update KYC information
        $kyc = KYC::where('user_id', $user->id)->first();
        if ($kyc) {
            $kyc->image = $imageName;
            $kyc->save();
        } else {
            // Create KYC record if it doesn't exist
            KYC::create([
                'user_id' => $user->id,
                'image' => $imageName
            ]);
        }
    }

    // Update name and email
    $user->name = $request->input('name');
    $user->save();

    return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
}

}
