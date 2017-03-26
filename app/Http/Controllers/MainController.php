<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Menu;
use App\Models\Cart;
use Session;
use Auth;

/**
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController extends Controller
{
    /**
     * MainController constructor.
     * @param \App\Models\Menu $menu
     */
    public function __construct(\App\Models\Menu $menu)
    {
        $this->data = [];
        $this->data['menu'] = $this->getMenu();
    }

    /**
     * @property \App\Models\Menu
     * @see https://github.com/lavary/laravel-menu
     * @return mixed
     */
    public function getMenu()
    {
        $menu = \App\Models\Menu::orderBy('position','desc')->get();;

        $mBuilder = Menu::make('MyNav', function($m) use ($menu) {

            foreach($menu as $item) {
                if($item->parent == 0) {
                    $m->add($item->name,$item->url)->id($item->id);
                }
                else {
                    if($m->find($item->parent)) {
                        $m->find($item->parent)->add($item->name,$item->url)->id($item->id);
                    }
                }
            }

        });
        return $mBuilder;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart',$this->data);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty],$this->data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        //dd($cart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total,'products' => $cart->items],$this->data);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('product.shopingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        //скрипт отправки почты
        try {
            $order = new Order();
            $order->cart = serialize($cart);
            $order->total = $total;
            $order->name = $request->input('first_name');
            $order->surname = $request->input('last_name');
            $order->address = $request->input('town');
            $order->phone = $request->input('phone');

           Auth::user()->orders()->save($order);

        } catch(\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        $data = $request->all();

         Mail::send('shop.mail',['data' => $data], function ($message) use ($data) {
            $mailAdmin = env('MAIL_ADDRESS');
            $message->from($mailAdmin ,$data['last_name']);
            $message->to($mailAdmin,'Main Admin')->subject('Order');

        });
        //удаление ключа из сессии
        Session::forget('cart');
        return redirect()->route('public.home')->with('success', 'Successfully purchased products!');
    }

}
