<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\CakeFilling;
use Illuminate\Http\Request;

class CakeFillingAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  response(CakeFilling::all())->header('X-Total-Count', CakeFilling::all()->count());
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
        $response = CakeFilling::create($request->all());
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CakeFilling  $cakeFilling
     * @return \Illuminate\Http\Response
     */
    public function show(CakeFilling $cakeFilling)
    {
        $response = CakeFilling::findOrFail($cakeFilling);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CakeFilling  $cakeFilling
     * @return \Illuminate\Http\Response
     */
    public function edit(CakeFilling $cakeFilling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CakeFilling  $cakeFilling
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, CakeFilling $cakeFilling)
    // {
    //     $response = CakeFilling::findOrFail($cakeFilling);
    //     $response->fill($request->except(['id']));
    //     $response->save();
    //     return $response;
    //     // return response()->json($response);
    //     // return CakeFilling::findOrFail($cakeFilling->id)->update($request->all());
    // }

    public function update(Request $request, $id)
    {
        $response = CakeFilling::findOrFail($id)->update($request->except(['id']));
        // $response->fill($request->except(['id']));
        // $response->save();
        // return response();
        $res = [
            'success' => true,
            'code' => 0,
            'message' => 'ok',
            'data' => $response,
        ];
        return response()->json(['code'=>201]);
        // return CakeFilling::findOrFail($cakeFilling->id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CakeFilling  $cakeFilling
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $response = CakeFilling::findOrFail($id);
        // // dd($cakeFilling);
        // if($response->delete()) return response(null, 204);
        return CakeFilling::destroy($id);
    }
}
