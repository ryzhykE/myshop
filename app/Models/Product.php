<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model
{
    /**
     * @return mixed
     */
    public function getProductSale()
    {
        return $this->select('id', 'name', 'first_img', 'sec_img', 'price')
            ->where([['sale', 1], ['available', 1] ])
            ->take(Config::get('settings.count_sale'))
            ->get();
    }
}
