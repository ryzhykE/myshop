<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Session;
use Auth;

class UserController extends MainController
{
    public function __construct(Menu $menu)
    {
        parent::__construct($menu);
    }

    public function getHome()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('panels.user.home',$this->data, ['products' => $cart->items,'orders' => $orders]);

    }

    public function getProtected()
    {
        return view('panels.user.protected');
    }

}