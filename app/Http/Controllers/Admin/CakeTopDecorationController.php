<?php

namespace App\Http\Controllers\Admin;

use App\CakeTopDecoration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CakeTopDecorationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Cake Filling list';
        $CakeTopDecorations = CakeTopDecoration::paginate(10);
        return  view('admin.cakeTopDecoration.index', compact('title', 'CakeTopDecorations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CakeTopDecorations = new CakeTopDecoration();
        return view('admin.cakeTopDecoration.create', compact('CakeTopDecorations'));
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
            'name' => 'required|max:100|min:3|unique:cake_fillings,name',
            'slug' => 'max:100|min:3|unique:cake_fillings,slug',
            'price' => 'required|max:100|min:1',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'describe' => 'required|max:2000|min:10',
            'visible' => '',
        ]);
        $CakeTopDecorations = CakeTopDecoration::create($request->all());

        return redirect('admin\cake-top-decorations')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CakeTopDecoration  $cakeTopDecoration
     * @return \Illuminate\Http\Response
     */
    public function show(CakeTopDecoration $cakeTopDecoration)
    {
        $CakeTopDecorations = CakeTopDecoration::findOrFail($cakeTopDecoration->id);
        return view('admin.cakeTopDecoration.show', compact('CakeTopDecorations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CakeTopDecoration  $cakeTopDecoration
     * @return \Illuminate\Http\Response
     */
    public function edit(CakeTopDecoration $cakeTopDecoration)
    {
        $CakeTopDecorations = CakeTopDecoration::find($cakeTopDecoration->id);
        return view('admin.cakeTopDecoration.edit', compact('CakeTopDecorations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CakeTopDecoration  $cakeTopDecoration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|min:3|unique:cake_fillings,name,'.$id,
            'slug' => 'sometimes|max:100|min:3|unique:cake_fillings,slug,'.$id,
            'price' => 'required|max:100|min:1',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'describe' => 'required|max:1000|min:10',
            'visible' => '',
        ]);

        $CakeTopDecoration = CakeTopDecoration::find($id);
        $CakeTopDecoration->update($request->all());
        return redirect('admin/cake-top-decorations')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CakeTopDecoration  $cakeTopDecoration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = CakeTopDecoration::destroy($id);
        return redirect('admin/cake-top-decorations')->with('success', 'Category with id: ' . $id . ' DELETED!');
    }
}
