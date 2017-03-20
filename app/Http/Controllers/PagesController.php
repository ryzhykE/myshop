<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Portfolio;

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
    public function getHome(Portfolio $portfolio)
    {
        $this->data['portfolio'] = $portfolio->getPortfolio();

        return view('pages.home',$this->data);
    }
}