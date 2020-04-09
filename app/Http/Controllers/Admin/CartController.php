<?php

namespace App\Http\Controllers\Admin;;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\Cake;
use App\Http\Controllers\Controller;
use Session;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
        // $cart = new Cart();
        // dd($product);
        Cart::add($product);
        // dd($request->all());
        return view('site.cart.cart');
    }

    public function addCustom(Request $request)
    {
        $product = Cake::find($request->product_id);
        // $cart = new Cart();
        // dd($product);
        Cart::addCustom($product);
        // dd($request->all());
        return view('site.cart.cart');
    }

    public function clear()
    {
        // $cart = new Cart();
        Cart::clear();
        Session::forget('booking');
        return view('site.cart.cart');
    }

    public function remove(Request $request)
    {
        // $cart = new Cart();
        Cart::remove($request->product_id);
        return view('site.cart.cart');
    }

    public function change(Request $request)
    {
        // $cart = new Cart();
        if ($request->product_qty<=0) {
            Cart::remove($request->product_id);
        }else{
            Cart::changeQty($request->product_id, $request->product_qty);
        };

        return view('site.cart.cart');
    }

    public function index()
    {
        return view('site.cart.checkout');
    }


}
