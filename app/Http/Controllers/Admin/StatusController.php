<?php

namespace App\Http\Controllers\Admin;

use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Status list';
        $Statuses = Status::paginate(10);
        return  view('admin.status.index', compact('title', 'Statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Statuses = new Status();
        return view('admin.status.create', compact('Statuses'));
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
            'name' => 'required|max:100|min:3|unique:statuses,name,',
            'name_ru' => 'sometimes|max:100|min:3|unique:statuses,name_ru,',
        ]);
        $Statuses = Status::create($request->all());

        return redirect('admin\statuses')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        $Statuses = Status::findOrFail($status->id);
        return view('admin.status.show', compact('Statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        $Statuses = Status::find($status->id);
        return view('admin.status.edit', compact('Statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|min:3|unique:statuses,name,'.$id,
            'name_ru' => 'sometimes|max:100|min:3|unique:statuses,name_ru,'.$id,
        ]);

        $Status = Status::find($id);
        $Status->update($request->all());
        return redirect('admin/statuses')->with('success', 'News with id: ' . $request->name . ' added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Status::destroy($id);
        return redirect('admin/statuses')->with('success', 'Category with id: ' . $id . ' DELETED!');
    }
}
