<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Portfolio;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends MainController
{
    /**
     * PagesController constructor.
     * @param Menu $menu
     */
    public function __construct(Menu $menu)
    {
        parent::__construct($menu);
    }

    /**
     * @param Portfolio $portfolio
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHome(Portfolio $portfolio, Product $product)
    {
        //cart in header
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        //main sale
        $this->data['prod'] = $product->getProductSale();
        // portfolio
        $this->data['portfolio'] = $portfolio->getPortfolio();

        return view('pages.home',$this->data,['products' => $cart->items]);
    }

}