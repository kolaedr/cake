<?php

namespace App\Http\Controllers\Admin;

use App\AdditionalFiller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdditionalFillerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Cake Filling list';
        $AdditionalFillers = AdditionalFiller::paginate(10);
        return  view('admin.cakeAdditionalFilling.index', compact('title', 'AdditionalFillers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $AdditionalFillers = new AdditionalFiller();
        return view('admin.cakeAdditionalFilling.create', compact('AdditionalFillers'));
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
        $AdditionalFillers = AdditionalFiller::create($request->all());

        return redirect('admin\cake-additional-fillings')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdditionalFiller  $additionalFiller
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $AdditionalFillers = AdditionalFiller::findOrFail($id);
        return view('admin.cakeAdditionalFilling.show', compact('AdditionalFillers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdditionalFiller  $additionalFiller
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $AdditionalFillers = AdditionalFiller::find($id);
        return view('admin.cakeAdditionalFilling.edit', compact('AdditionalFillers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdditionalFiller  $additionalFiller
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

        $AdditionalFiller = AdditionalFiller::find($id);
        $AdditionalFiller->update($request->all());
        return redirect('admin/cake-additional-fillings')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdditionalFiller  $additionalFiller
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = AdditionalFiller::destroy($id);
        return redirect('admin/cake-additional-fillings')->with('success', 'Category with id: ' . $id . ' DELETED!');
    }
}
