<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Category list';
        $Categories = Category::paginate(10);
        return  view('admin.categories.index', compact('title', 'Categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = new Category();
        return view('admin.categories.create', compact('Categories'));
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
            'name' => 'required|max:100|min:3|unique:categories,name',
            'slug' => 'max:100|min:3|unique:categories,slug',
            'price' => 'required|max:10|min:1',
            'image' => 'required',
            'describe' => 'required|max:2000|min:10',
            'visible' => '',
        ]);
        $Categories = Category::create($request->all());

        return redirect('admin\categoriess')->with('success', 'categoriess with id: ' . $request->name . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $Categories = Category::findOrFail($category->id);
        return view('admin.categories.show', compact('Categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $Categories = Category::find($category->id);
        $categoryList = Category::all('id', 'name')->pluck('name', 'id');
        return view('admin.categories.edit', compact('Categories', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|min:3|unique:categoriess,name,'.$id,
            'slug' => 'sometimes|unique:categoriess,slug,'.$id,
            'parent_id' => 'sometimes||exists:categoriess,slug,'.$id,
            'price' => 'required|max:100|min:1',
            'image' => 'required',
            'describe' => 'required|max:1000|min:10',
            'visible' => '',
        ]);

        $Category = Category::find($id);
        $Category->update($request->all());
        return redirect('admin/categoriess')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::destroy($id);
        return redirect('admin/categoriess')->with('success', 'Category with id: ' . $id . ' DELETED!');
    }
}
