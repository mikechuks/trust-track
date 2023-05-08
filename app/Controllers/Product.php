<?php

namespace App\Controllers;

class Product extends BaseController
{
    public function viewAllProduct()
    {

        return view('dashboard/product/view-all-product');
    }

    public function viewSpecificProduct()
    {

        return view('dashboard/product/view-specific-product');
    }
}