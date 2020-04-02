<?php

namespace App\Http\Controllers\Admin;

use App\AdditionalDecoration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdditionalDecorationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Cake Filling list';
        $AdditionalDecorations = AdditionalDecoration::paginate(10);
        return  view('admin.cakeAdditionalDecoration.index', compact('title', 'AdditionalDecorations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $AdditionalDecorations = new AdditionalDecoration();
        return view('admin.cakeAdditionalDecoration.create', compact('AdditionalDecorations'));
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
            'image' => 'required',
            'describe' => 'required|max:2000|min:10',
            'visible' => '',
        ]);
        $AdditionalDecorations = AdditionalDecoration::create($request->all());

        return redirect('admin\cake-additional-decorations')->with('success', 'Created: ' . $request->name . '!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdditionalDecoration  $additionalDecoration
     * @return \Illuminate\Http\Response
     */
    public function show(AdditionalDecoration $additionalDecoration)
    {
        $AdditionalDecorations = AdditionalDecoration::findOrFail($additionalDecoration->id);
        return view('admin.cakeAdditionalDecoration.show', compact('AdditionalDecorations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdditionalDecoration  $additionalDecoration
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $AdditionalDecorations = AdditionalDecoration::find($id);
        return view('admin.cakeAdditionalDecoration.edit', compact('AdditionalDecorations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdditionalDecoration  $additionalDecoration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|min:3|unique:cake_fillings,name,'.$id,
            'slug' => 'sometimes|max:100|min:3|unique:cake_fillings,slug,'.$id,
            'price' => 'required|max:100|min:1',
            'image' => 'required',
            'describe' => 'required|max:1000|min:10',
            'visible' => '',
        ]);

        $AdditionalDecoration = AdditionalDecoration::find($id);
        $AdditionalDecoration->update($request->all());
        return redirect('admin/cake-additional-decorations')->with('success', 'Update: ' . $request->name . ' !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdditionalDecoration  $additionalDecoration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = AdditionalDecoration::destroy($id);
        return redirect('admin/cake-additional-decorations')->with('success', 'Category with id: ' . $id . ' DELETED!');
    }
}
