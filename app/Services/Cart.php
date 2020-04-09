<?
namespace App\Services;

use Session;

class Cart{
    public function add($p)
    {
        if (Session::get('cart.product_'.$p->id)) {
            $old = Session::get('cart.product_'.$p->id)['qty'];
            Session::put('cart.product_'.$p->id.'.qty', $old+$qty);
        }else{
            Session::put('cart.product_'.$p->id, [
                'id' => $p->id,
                'name' => $p->name,
                'price' => $p->price,
                'image' => $p->image,
                'qty' => 1,
                'type' => null,
            ]);
        };
        $this->totalPrice();
    }

    public function addCustom($p, $type, $booking)
    {
        if (Session::get('cart.product_'.$p->id)) {
            $old = Session::get('cart.product_'.$p->id)['qty'];
            Session::put('cart.product_'.$p->id.'.qty', $old+$qty);
        }else{
            Session::put('cart.product_'.$p->id, [
                'id' => $p->id,
                'name' => $p->tierOne->name,
                'price' => $p->price,
                'image' => $p->tierOne->image,
                'qty' => 1,
                'type' => $type,
                'booking' => $booking,
            ]);
        };
        $this->totalPrice();
    }

    public function remove($id)
    {
        Session::forget('cart.product_'.$id);
        $this->totalPrice();
    }

    public function changeQty($id, $qty)
    {
        Session::put('cart.product_'.$id.'.qty', $qty);
        $this->totalPrice();
    }

    public function clear()
    {
        Session::forget('cart');
        Session::forget('booking');
        // session('booking').forget();
    }

    public function totalPrice()
    {
        $sum = 0;
        foreach(Session::get('cart') as $total){
            $sum+=$total['qty']*$total['price'];
        };
        Session::put('totalPrice', $sum);
    }


}
