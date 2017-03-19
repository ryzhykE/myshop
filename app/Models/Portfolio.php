<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class Portfolio extends Model
{
    public function getPortfolio()
    {
        return $this->where('available',1)->take(Config::get('settings.count_slider'))->get();
    }
}
