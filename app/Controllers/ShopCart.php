<?php

namespace App\Controllers;

class ShopCart extends BaseController
{
    public function viewCart()
    {

        return view('dashboard/shopping-cart/shop-cart');
    }
}