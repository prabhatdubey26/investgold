<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Razorpay\Api\Api;
use App\Models\WalletTrasaction;

class PaymentController extends Controller
{

    public function index()
    {
       return view('test');
    }

    public function makePayment(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    
        // Check if the payment ID exists in the request
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                // Fetch the payment from Razorpay
                $payment = $api->payment->fetch($input['razorpay_payment_id']);
                // Ensure the captured amount matches the authorized amount
                $fee = $payment['fee']; // Razorpay fee
                $authorizedAmount = $payment['amount']; 
                $amountToCapture = $authorizedAmount - $fee;
            
                // Check if the payment is authorized
                if ($payment['status'] === 'authorized') {
                    // Capture the payment using the amount authorized
                    $response = $payment->capture(['amount' => $amountToCapture]);
                    // dd($response);
                    $json = [
                        'amount' => $response['amount'] / 100, // Convert to INR
                        'fee' => $response['fee'] / 100, // Convert fee to INR
                        'tax' => $response['tax'] / 100, 
                    ];
                    // Update the order with payment details
                    Order::where('id', $request->order_id)->update([
                        'r_payment_id' => $response['id'],
                        'method' => $response['method'],
                        'currency' => $response['currency'],
                        'payment_status' => $response['status'],
                        'json_response' => json_encode($json)
                    ]);
                
                    return redirect('success');
                } 
                else{
                    dd($response);
                }
            } catch (Exception $e) {
                return redirect()->back()->withErrors(['message' => $e->getMessage()]);
            }
        } else {
            Session::put('error', 'Invalid payment details.');
            return redirect()->back();
        }
    }
    

    public function success()
    {
        $successMessage = "Your payment was successful! Thank you for your order.";
        return view('success', compact('successMessage'));
    }

    public function showTransactions()
    {
        $transactions = WalletTrasaction::latest()->with('user')->paginate(20);
        return view('admin.transactions', compact('transactions'));
    }

}
