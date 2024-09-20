<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth()->user();
        $orders = Order::where(['user_id'=>$user->id])->paginate(10); 
        $layout = 'user';
        if($user->role==1){
            $orders = Order::paginate(10);
            $layout = 'auth';
        }
        return view('orders.index', compact('orders','layout'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:created,processing,completed',
        ]);

        $order = Order::find($id);
        $order->order_status = $request->status;
        $order->save();

        return response()->json(['success' => true, 'status' => $order->order_status]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
