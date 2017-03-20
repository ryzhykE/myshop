<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Menu;

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
       //dd($mBuilder);
        return $mBuilder;
    }

}
