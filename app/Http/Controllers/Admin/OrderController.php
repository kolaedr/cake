<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CakeFilling;
use App\Cake;
use App\User;
use App\Status;
use App\OrderList;
use Cart;
use Booking;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = 'Order list';
        $Orders = Order::orderBy('created_at', 'desc')->paginate(10);
        $statuses = Status::all('id', 'name')->pluck('name', 'id');
        // $Orders = Order::where('status_id', '<>', 6)->paginate(10);
        $cake = CakeFilling::all();
        // dd($Orders->cakes);
        return  view('admin.orders.index', compact('title', 'Orders', 'cake', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Orders = new Order();
        return view('admin.orders.create', compact('Orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking' => 'max:100|min:1',
            'count' => 'required|max:100|min:1',
            'comments' => 'sometime|max:100|min:1',
        ]);
        $Orders = Order::create($request->all());

        return redirect('admin\orders')->with('success', 'Order: ' . $request->name . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $Orders = Order::findOrFail($order->id);

        return view('admin.orders.show', compact('Orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $Orders = Order::find($order->id);
        // dd($Orders);
        $statuses = Status::all('id', 'name')->pluck('name', 'id');
        return view('admin.orders.edit', compact('Orders', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'booking' => 'max:100|min:1',
        //     'status_id' => 'max:100|min:1',
        //     'count' => 'required|max:100|min:1',
        //     'comments' => 'sometime|max:100|min:1',
        // ]);

            // dd($request->all());
        $Order = Order::find($id);
        $Order->update($request->all());
        // $Order->update(['status_id'=>$request->status_id, 'total_amount'=>$request->total_amount, 'admin_comment'=>$request->admin_comment]);
        return back()->with('success', 'Order: ' . $request->name . ' update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Booking::remove(Order::find($id)->booking, Order::find($id)->cakes->count());
        $delete = Order::destroy($id);

        return redirect('admin/orders')->with('success', 'Order id: ' . $id . ' DELETED!');
    }

    public function checkout()
    {
        return view('site.cart.checkout');
    }

    public function confirmOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|max:1000|min:0',
            'phone' => 'required|max:19|min:10',
            'delivery' => 'required',
            'booking' => 'required',
            'street' => 'sometimes|nullable|max:50|min:0',
            'build' => 'sometimes|nullable|max:4|min:0',
            'room' => 'sometimes|nullable|max:4|min:0',
        ]);

        $totalSum = 0;
        $order = new Order();
        $order->user_id = User::checkUser($request);
        $order->status_id = 1;
        $order->total_amount = session('totalPrice');
        // $order->total_amount = $totalSum;
        $order->booking = session('booking')??$request->booking;
        $order->save();
        $order_id = $order->id;

        foreach(session('cart') as $product){
            if ($product['type'] !== 'cake') {
                //  dd($or->list[0]->product);
                $item = new OrderList();
                $item->order_id = $order_id;
                $item->product_id = $product['id'];
                $item->qty = $product['qty'];
                $item->price = $product['price'];
                $item->save();
                $totalSum+=$product['qty']*$product['price'];
            }else{
                $order->update(['booking' => $product['booking']]);

                Cake::find($product['id'])->update(['order_id' => $order_id]);
                $totalSum+=$product['qty']*$product['price'];
            };
        };
        $order->update(['total_amount' => $totalSum]);

        \Booking::add(session('booking')??$request->booking, $order->cakes->count());

        // event(new \App\Events\ChangeOrderEvent($order));
        \Cart::clear();

        return redirect('user\orders');
        // return back();
    }
}



// public function confirmOrder(Request $request)
//     {
//         // dd();
//         foreach(session('cart') as $item){
//             if (empty($item['order_id'])) {
//                 //  dd($or->list[0]->product);
//                 $order = new Order();
//                 $order->user_id = User::checkUser($request);
//                 $order->status_id = 2;
//                 $order->booking = \Carbon\Carbon::now()->format('Y-m-d H:i');
//                 $order->total_amount = session('totalPrice');
//                 $order->save();
//                 $order_id = $order->id;
//             }else{
//                 $order = Order::find($item['order_id']);
//                 $order_id = $order->id;
//                 $order->update(['status_id' => 2]);
//             };
//         };


//         // dd($or->list[0]->product);
//         // $order = new Order();
//         // $order->user_id = \Auth::user()->id;
//         // $order->status_id = 1;
//         // $order->total_sum = session('totalPrice');
//         // $order->save();
//         // dd(session('cart'));
//         $totalSum = 0;

//         foreach(session('cart') as $product){
//             if (empty($product['order_id'])) {
//                 $item = new OrderList();
//                 $item->order_id = $order_id;
//                 $item->product_id = $product['id'];
//                 $item->qty = $product['qty'];
//                 $item->price = $product['price'];
//                 $item->save();
//                 $totalSum+=$product['qty']*$product['price'];
//             };
//         };
//           // dd($order->statuses());
//         // $order->statuses()->save(2);

//         // $order->update(['status_id' => 2]);
//         $order->increment('total_amount', $totalSum);
//         // event(new \App\Events\ChangeOrderEvent($order));
//         \Cart::clear();
//         // if (empty(session('order_id'))) {
//         //     Session::forget('order_id');
//         // };

//         // session('order_id')->forget();
//         // return view('mail.order-admin', compact('order'));
//         return redirect('user\orders');
//         // return back();
//     }
