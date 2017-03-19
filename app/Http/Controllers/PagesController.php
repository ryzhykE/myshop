<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class PagesController extends MainController
{
    public function __construct(Menu $menu)
    {
        parent::__construct($menu);
    }

    public function getHome()
    {
        return view('pages.home',$this->data);
    }
}