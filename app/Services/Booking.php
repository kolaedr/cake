<?
namespace App\Services;

use App\Order;
// use \App\Booking;

class Booking{

    public function add($date, $count)
    {
        $day = \Carbon\Carbon::parse($date)->format('Y-m-d');
        // dd($day);
        if (\App\Booking::where('booking_day', '=', $day)->first()) {
            \App\Booking::where('booking_day', '=', $day)->first()->decrement('cake_count', $count);
        }else {
            $bookDay = \App\Booking::create(['booking_day' => $day]);
            $bookDay->decrement('cake_count', $count);
        }
    }

    public function remove($date, $count)
    {
        $day = \Carbon\Carbon::parse($date)->format('Y-m-d');
        \App\Booking::firstWhere('booking_day', '=', $day)->increment('cake_count', $count);
    }

    public function clear()
    {
        //
    }


}
