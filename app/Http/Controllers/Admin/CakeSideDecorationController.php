<?php

namespace App\Http\Controllers\Admin;

use App\CakeSideDecoration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CakeSideDecorationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Cake Filling list';
        $CakeSideDecorations = CakeSideDecoration::paginate(10);
        return  view('admin.cakeSideDecoration.index', compact('title', 'CakeSideDecorations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CakeSideDecorations = new CakeSideDecoration();
        return view('admin.cakeSideDecoration.create', compact('CakeSideDecorations'));
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
        $CakeSideDecorations = CakeSideDecoration::create($request->all());

        return redirect('admin\cake-side-decorations')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CakeSideDecoration  $cakeSideDecoration
     * @return \Illuminate\Http\Response
     */
    public function show(CakeSideDecoration $cakeSideDecoration)
    {
        $CakeSideDecorations = CakeSideDecoration::findOrFail($cakeSideDecoration->id);
        return view('admin.cakeSideDecoration.show', compact('CakeSideDecorations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CakeSideDecoration  $cakeSideDecoration
     * @return \Illuminate\Http\Response
     */
    public function edit(CakeSideDecoration $cakeSideDecoration)
    {
        $CakeSideDecorations = CakeSideDecoration::find($cakeSideDecoration->id);
        return view('admin.cakeSideDecoration.edit', compact('CakeSideDecorations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CakeSideDecoration  $cakeSideDecoration
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

        $CakeSideDecoration = CakeSideDecoration::find($id);
        $CakeSideDecoration->update($request->all());
        return redirect('admin/cake-side-decorations')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CakeSideDecoration  $cakeSideDecoration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = CakeSideDecoration::destroy($id);
        return redirect('admin/cake-side-decorations')->with('success', 'Category with id: ' . $id . ' DELETED!');
    }
}
