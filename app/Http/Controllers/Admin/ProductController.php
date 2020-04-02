<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Product list';
        $Products = Product::paginate(10);
        return  view('admin.product.index', compact('title', 'Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Products = new Product();
        return view('admin.product.create', compact('Products'));
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
            'name' => 'required|max:100|min:3|unique:products,name',
            'slug' => 'max:100|min:3|unique:products,slug',
            'price' => 'required|max:100|min:1',
            'image' => 'required',
            'describe' => 'required|max:2000|min:10',
            'visible' => '',
        ]);
        $Products = Product::create($request->all());

        return redirect('admin\products')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $Products = Product::findOrFail($product->id);
        return view('admin.product.show', compact('Products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $Products = Product::find($product->id);
        return view('admin.product.edit', compact('Products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|min:3|unique:products,name,'.$id,
            'slug' => 'sometimes|max:100|min:3|unique:products,slug,'.$id,
            'price' => 'required|max:100|min:1',
            'image' => 'required',
            'describe' => 'required|max:1000|min:10',
            'visible' => '',
        ]);

        $Product = Product::find($id);
        $Product->update($request->all());
        return redirect('admin/products')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::destroy($id);
        return redirect('admin/products')->with('success', 'Category with id: ' . $id . ' DELETED!');
    }
}
