<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cake;
use App\Order;
use App\Status;
use App\Delivery;
use App\OrderCake;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $size = Order::all();
        $size = Order::find(1)->cakes;
        // $sizee = \App\CakeTopDecoration::find($size->cake_filling_lavel_1_id);
        dd($size);
        return view('home');
    }
}
