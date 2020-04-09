<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Order;
use App\DefaultSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function getFreeDay()
    {
        $freeDay = Booking::where('cake_count', '>', 0)->get();
        return response()->json($freeDay);
    }

    public function getBookingList()
    {
        $tZone = new \DateTimeZone("Europe/Kiev");
        $booking = Booking::all(['booking_day', 'event', 'cake_count', 'cheesecake_count', 'cupcake_count']);
        $defaultSettings = DefaultSetting::all();
        $orders = Order::where('booking', '>', \Carbon\Carbon::now())->get(['booking']);
        $book = ['default' => $defaultSettings, 'booking' => $booking, 'orders' => $orders];
        // foreach($days as $ket=>$day){
        //     // dd($day);
        //     $disableDay['disabled_days'] = [$day];
        //     // $disableDay['disabled_days'][] = $day['booking_day'];
        // }
        // foreach($times as $time){
        //     // dd($day);
        //     $disableDay['disabled_times'][] = $time['booking'];
        // }
        // foreach($freeDays as $freeDay){
        //     // dd($day);
        //     $disableDay['cake_count'] = [$freeDay['booking_day'] => $freeDay['cake_count']];
        // }

        return response()->json($book);
    }

    // public function getBookingList()
    // {
    //     $tZone = new \DateTimeZone("Europe/Kiev");
    //     $days = Booking::where('cake_count', '=', 0)->get();
    //     $freeDays = Booking::where('cake_count', '<>', 0)->get();
    //     $times = Order::where('booking', '>', \Carbon\Carbon::now())->get();
    //     $disableDay = [];
    //     foreach($days as $ket=>$day){
    //         // dd($day);
    //         $disableDay['disabled_days'] = [$day];
    //         // $disableDay['disabled_days'][] = $day['booking_day'];
    //     }
    //     foreach($times as $time){
    //         // dd($day);
    //         $disableDay['disabled_times'][] = $time['booking'];
    //     }
    //     foreach($freeDays as $freeDay){
    //         // dd($day);
    //         $disableDay['cake_count'] = [$freeDay['booking_day'] => $freeDay['cake_count']];
    //     }

    //     return response()->json($disableDay);
    // }
}
