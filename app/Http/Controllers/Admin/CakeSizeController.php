<?php

namespace App\Http\Controllers\Admin;

use App\CakeSize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CakeSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Cake size list';
        $CakeSizes = CakeSize::paginate(10);
        return  view('admin.cakeSize.index', compact('title', 'CakeSizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CakeSizes = new CakeSize();
        return view('admin.cakeSize.create', compact('CakeSizes'));
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
            'tier' => 'required|max:5|min:1',
            'weight_min' => 'max:5|min:1',
            'weight_max' => 'required|max:5|min:1',
            'price' => 'required',
            'piece_min' => 'required|max:50|min:1',
            'piece_max' => 'required|max:50|min:1',
            'visible' => '',
        ]);
        $CakeSizes = CakeSize::create($request->all());

        return redirect('admin\cake-sizes')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CakeSize  $cakeSize
     * @return \Illuminate\Http\Response
     */
    public function show(CakeSize $cakeSize)
    {
        $CakeSizes = CakeSize::findOrFail($cakeSize->id);
        return view('admin.cakeSize.show', compact('CakeSizes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CakeSize  $cakeSize
     * @return \Illuminate\Http\Response
     */
    public function edit(CakeSize $cakeSize)
    {
        $CakeSizes = CakeSize::find($cakeSize->id);
        return view('admin.cakeSize.edit', compact('CakeSizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CakeSize  $cakeSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tier' => 'required|max:5|min:1',
            'weight_min' => 'max:5|min:1',
            'weight_max' => 'required|max:5|min:1',
            'price' => 'required',
            'piece_min' => 'required|max:50|min:1',
            'piece_max' => 'required|max:50|min:1',
            'visible' => '',
        ]);

        $CakeSize = CakeSize::find($id);
        $CakeSize->update($request->all());
        return redirect('admin/cake-sizes')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CakeSize  $cakeSize
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = CakeSize::destroy($id);
        return redirect('admin/cake-sizes')->with('success', 'Category with id: ' . $id . ' DELETED!');
    }
}
