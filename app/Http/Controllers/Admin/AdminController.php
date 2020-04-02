<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Product;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'New orders list';
        $Orders = \App\Order::where('status_id', '<>', 6)->paginate(10);
        $cake = \App\CakeFilling::all();

        return view('admin.dashboard', compact('title', 'Orders', 'cake'));
    }

    public function lang()
    {
        // dd(Auth::user()->isAdmin());
        return view('admin.lang');
    }



    // public function destroy($id)
    // {
    //     $product = Product::find($id);
    //     $product->delete();
    //     return redirect('/admin/product')->with('success', 'Category with id: ' . $product->id . ' DELETED!');
    // }
}
