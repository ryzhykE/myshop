<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

/**
 * Class Portfolio
 * @package App\Models
 */
class Portfolio extends Model
{
    /**
     * @return mixed
     */
    public function getPortfolio()
    {
        return $this->where('available',1)->take(Config::get('settings.count_slider'))->get();
    }
}
