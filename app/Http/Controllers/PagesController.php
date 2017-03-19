<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Portfolio;

class PagesController extends MainController
{
    public function __construct(Menu $menu)
    {
        parent::__construct($menu);
    }

    public function getHome(Portfolio $portfolio)
    {
        //$portfolio = Portfolio::all();
        $this->data['portfolio'] = $portfolio->getPortfolio();

        return view('pages.home',$this->data);
    }
}