<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Cake;
use App\Order;
use App\User;
use App\Image;
use App\Delivery;
use Illuminate\Http\Request;
use Cart;
use Session;

class CakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'cake_size_id' => 'required',
            'booking' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'text_decoration' => 'sometimes|nullable|max:1000|min:0',
            'comment' => 'sometimes|nullable|max:1000|min:0',
            'name' => 'required|max:1000|min:0',
            'phone' => 'required|max:19|min:10',
            'delivery' => 'required',
            'street' => 'sometimes|nullable|max:4|min:0',
            'build' => 'sometimes|nullable|max:4|min:0',
            'room' => 'sometimes|nullable|max:18|min:12',
            'cake_filling_tier_1_id' => 'required|exists:cake_fillings,id',
            'cake_filling_tier_2_id' => 'sometimes|nullable|exists:cake_fillings,id',
            'cake_filling_tier_3_id' => 'sometimes|nullable|exists:cake_fillings,id',
            'cake_top_decoration_id' => 'required|exists:cake_top_decorations,id',
            'cake_side_decoration_id' => 'exists:cake_side_decorations,id',

        ]);

        $request->request->add(['user_id' => User::checkUser($request)]);

        $request->request->add(['status_id' => '1']);


        $reOrder = Order::where([
            ['user_id', '=', $request->user_id],
            ['status_id', '=', 1],
            ['booking', '=', $request->booking]
            ])->first();

        if ($reOrder) {
            $request->request->add(['order_id' => $reOrder->id]);
            Session::put('order_id', $reOrder->id);
            // Cart::addCustom(Cake::find($cake->id), $order->id);
        }else{
            // dd($request->all());
            $order = Order::create($request->all());
            $request->request->add(['order_id' => $order->id]);

            Session::put('order_id', $order->id);
            // dd($order->id);

        };

        if ($request->cake_filling_tier_2_id == 0) {
            $request->request->add(['cake_filling_tier_2_id' => $request->cake_filling_tier_1_id]);
        }
        if ($request->cake_filling_tier_3_id == 0) {
            $request->request->add(['cake_filling_tier_3_id' => $request->cake_filling_tier_1_id]);
        }

        $cake = Cake::create($request->all());
        $cake->AdditionalDecorations()->sync($request->additional_decorations_id);
        $cake->AdditionalFillers()->sync($request->additional_filler_id);

        if($request->file('image')){
            $images = array();
            $insert = array();
            foreach($request->file('image') as $img){
                $name='user_'.$img->getClientOriginalName();
                $img->move('images/users',$name);
                $name = '/images/users/'.$name;
                $im = Image::create(['url' => $name, 'alt' => 1]);
                $insert[]=$im->id;
            }
            $cake->images()->sync($insert);
        }

        $cakeCost = $this->totalAmount($cake->id);
        Order::find($request->order_id)->update(['total_amount' => $cakeCost]);
        $cake->price = $cakeCost;
        $cake->save();

        if ($reOrder) {
            $reOrder->increment('total_amount', $cakeCost);
        };

        Cart::addCustom(Cake::find($cake->id), $reOrder?$reOrder->id:$order->id);

        return back();
        // return redirect('/user/orders');
    }

    public function totalAmount($id)
    {
        $total = 0;
        $cake = Cake::find($id);
        $total += $cake->tierOne->price*$cake->CakeSizes->price*$cake->CakeSizes->weight_max;
        $total += $cake->CakeTopDecorations->price;
        $total += $cake->CakeSideDecorations->price;
        foreach($cake->AdditionalDecorations as $adddec){
            $total += $adddec->price;
        };
        foreach($cake->AdditionalFillers as $addfill){
            $total += $addfill->price;
        };
        return $total;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cake  $cake
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Cake $cake)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cake  $cake
     * @return \Illuminate\Http\Response
     */
    public function edit(Cake $cake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cake  $cake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cake $cake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cake  $cake
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Cake::destroy($id);
        return back()->with('success', 'Cake with id: ' . $id . ' DELETED!');
    }
}
