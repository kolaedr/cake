<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use Cart;

class UserController extends Controller
{
    public function userAccount()
    {
        $user= \Auth::user()->name;

        return view('site.user.index', compact('user'));
    }

    public function userOrders()
    {
        // $orders = Order::where('user_id', \Auth::user()->id)->first();
        $orders = Order::where([
            ['user_id', '=', \Auth::user()->id],
            // ['status_id', '<>', '1'],
            ])->get();
        // dd($orders->cakes[0]->tierOne);
        return view('site.user.orders', compact('orders'));
    }

    public function userProfile()
    {
        return view('site.user.profile');
    }

    public function userChangeSettings()
    {
        Cart::clear();
        return view('site.user.change-settings');
    }

    public function updateInfo(Request $request, $id)
    {
        User::find($id)->update($request->all());
        return redirect('/user/profile')->with('success', 'Profile update!');;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
