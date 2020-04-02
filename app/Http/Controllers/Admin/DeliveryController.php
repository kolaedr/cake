<?php

namespace App\Http\Controllers\Admin;

use App\Delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delivery list';
        $Deliveries = Delivery::paginate(10);
        return  view('admin.delivery.index', compact('title', 'Deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Deliveries = new Delivery();
        return view('admin.delivery.create', compact('Deliveries'));
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
            'street' => 'required|max:100|min:3',
            'build' => 'max:100|min:1',
            'build_index' => 'sometimes|max:5|min:1',
            'room' => 'sometimes',
            'comments' => 'sometimes|max:1000|min:10',
        ]);
        $Deliveries = Delivery::create($request->all());

        return redirect('admin\deliveries')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        $Deliveries = Delivery::findOrFail($delivery->id);
        return view('admin.delivery.show', compact('Deliveries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        $Deliveries = Delivery::find($delivery->id);
        return view('admin.delivery.edit', compact('Deliveries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'street' => 'required|max:100|min:3',
            'build' => 'max:100|min:1',
            'build_index' => 'sometimes|max:5|min:1',
            'room' => 'sometimes',
            'comments' => 'sometimes|max:1000|min:10',
        ]);

        $Delivery = Delivery::find($id);
        $Delivery->update($request->all());
        return redirect('admin/deliveries')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Delivery::destroy($id);
        return redirect('admin/deliveries')->with('success', 'Category with id: ' . $id . ' DELETED!');
    }
}
