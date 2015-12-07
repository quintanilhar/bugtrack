<?php

namespace App\Repository;

use App\Product;

class ProductRepository
{
    public function fetchAllActive()
    {
        return Product::where(['is_active' => '1'])
            ->orderBy('name', 'asc')
            ->get();
    }
}
