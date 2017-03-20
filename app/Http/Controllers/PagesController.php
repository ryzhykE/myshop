<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Portfolio;
use App\Models\Product;
use Illuminate\Http\Request;

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
        //main sale
        $this->data['products'] = $product->getProductSale();
        // portfolio
        $this->data['portfolio'] = $portfolio->getPortfolio();

        return view('pages.home',$this->data);
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        dd();
    }

}