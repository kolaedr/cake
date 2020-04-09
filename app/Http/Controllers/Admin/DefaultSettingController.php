<?php

namespace App\Http\Controllers\Admin;;

use App\DefaultSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DefaultSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $defaultSetting = DefaultSetting::all();
        return view('admin.orders.default-setting', compact('defaultSetting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DefaultSetting  $defaultSetting
     * @return \Illuminate\Http\Response
     */
    public function show(DefaultSetting $defaultSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DefaultSetting  $defaultSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(DefaultSetting $defaultSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DefaultSetting  $defaultSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'default_count' => 'required|max:100|min:1|numeric',
            'cake_count' => 'max:100|min:1|numeric',
            'cheesecake_count' => 'max:100|min:1|numeric',
            'cupcake_count' => 'max:1000|min:1|numeric',
        ]);
        DefaultSetting::find($id)->update($request->all());

        return back()->with('success', 'Limits for orders update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DefaultSetting  $defaultSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(DefaultSetting $defaultSetting)
    {
        //
    }
}
