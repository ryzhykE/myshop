<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class UserController extends MainController
{
    public function __construct(Menu $menu)
    {
        parent::__construct($menu);
    }

    public function getHome()
    {

        return view('panels.user.home',$this->data);

    }

    public function getProtected()
    {

        return view('panels.user.protected');

    }

}