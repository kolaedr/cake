<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cake;
use App\Order;
use App\Status;
use App\Delivery;
use App\OrderCake;
use App\CakeSideDecoration;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('site.home.index');
    }

    public function OrderCake()
    {
        // $user = Order::all();
        // foreach ($user as $value) {
        //     dump(date("Y/m/d", $value->booking));
        // }
        $cc = Cake::totalAmount();
        $cake = new Cake();
        $CakeFillings = \App\CakeFilling::all();
        // $CakeFillings = \App\CakeFilling::all('id', 'name')->pluck('name', 'id');
        $CakeTopDecorations = \App\CakeTopDecoration::all();
        // $CakeTopDecorations = \App\CakeTopDecoration::all('id', 'name')->pluck('name', 'id');
        $CakeSideDecorations = CakeSideDecoration::all();
        // $CakeSideDecorations = CakeSideDecoration::all('id', 'name')->pluck('name', 'id');
        $CakeSizes = \App\CakeSize::all();
        // $CakeSizes = \App\CakeSize::all('id', 'tier')->pluck('tier', 'id');
        $AdditionalFillers = \App\AdditionalFiller::all();
        // $AdditionalFillers = \App\AdditionalFiller::all('id', 'name')->pluck('name', 'id');
        $AdditionalDecorations = \App\AdditionalDecoration::all();
        // $AdditionalDecorations = \App\AdditionalDecoration::all('id', 'name')->pluck('name', 'id');
        $delivery = \App\Delivery::all();
        $orders = \App\Order::all();
        if (\Auth::check()) {
            $user = \App\User::find(\Auth::user()->id);
        }else{
            $user = null;
        }

        // $size = Order::find(4)->users;
        // $sizee = \App\CakeTopDecoration::find($size->cake_filling_tier_1_id);
        // dd($orders);
        return view('site.order.cake.cake', compact(
            'cake',
            'CakeSideDecorations',
            'CakeTopDecorations',
            'CakeFillings',
            'CakeSizes',
            'AdditionalFillers',
            'AdditionalDecorations',
            'delivery',
            'orders',
            'user',
            'cc'
        ));
    }

    public function allCakes()
    {
        $cakes = \App\CakeFilling::all();
        return view('site.home.cakes', compact('cakes'));
    }

    public function allProducts()
    {
        $categories = \App\Category::all();
        $products = \App\Product::all();
        return view('site.home.product.products', compact('products', 'categories'));
    }

    public function singleProducts($slug)
    {
        $categories = \App\Category::all();
        $products = \App\Product::all();
        $product = \App\Product::where('slug', $slug)->first();
        return view('site.home.product.single-product', compact('products', 'product', 'categories'));
    }

    public function singleCategory($slug)
    {
        $categories = \App\Category::all();
        $products = \App\Category::where('slug', $slug)->first();
        return view('site.home.category.single-category', compact('products', 'categories'));
    }
}
