<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\CakeFilling;
use Illuminate\Http\Request;
use ResponseBuilder;

class CakeFillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Cake Filling list';
        $CakeFillings = CakeFilling::paginate(10);
        return  view('admin.cakefilling.index', compact('title', 'CakeFillings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CakeFillings = new CakeFilling();
        return view('admin.cakefilling.create', compact('CakeFillings'));
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
            'image' => '',
            'describe' => 'required|max:2000|min:10',
            'visible' => '',
        ]);
        $CakeFillings = CakeFilling::create($request->all());

        return redirect('admin\cake-fillings')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CakeFilling  $cakeFilling
     * @return \Illuminate\Http\Response
     */
    public function show(CakeFilling $cakeFilling)
    {
        $CakeFillings = CakeFilling::findOrFail($cakeFilling->id);
        return view('admin.cakefilling.show', compact('CakeFillings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CakeFilling  $cakeFilling
     * @return \Illuminate\Http\Response
     */
    public function edit(CakeFilling $cakeFilling)
    {
        $CakeFillings = CakeFilling::find($cakeFilling->id);
        return view('admin.cakefilling.edit', compact('CakeFillings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CakeFilling  $cakeFilling
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|min:3|unique:cake_fillings,name,'.$id,
            'slug' => 'sometimes|max:100|min:3|unique:cake_fillings,slug,'.$id,
            'price' => 'required|max:100|min:1',
            'image' => '',
            'describe' => 'required|max:1000|min:10',
            'visible' => '',
        ]);

        $CakeFilling = CakeFilling::find($id);
        $CakeFilling->update($request->all());
        return redirect('admin/cake-fillings')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CakeFilling  $cakeFilling
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = CakeFilling::destroy($id);
        return redirect('admin/cake-fillings')->with('success', 'Category with id: ' . $id . ' DELETED!');
    }
}

