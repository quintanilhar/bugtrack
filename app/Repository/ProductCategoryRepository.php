<?php

namespace App\Repository;

use App\ProductCategory;

class ProductCategoryRepository
{
    public function fetchAllActive()
    {
        return ProductCategory::where(['is_active' => '1'])
            ->orderBy('name', 'asc')
            ->get();
    }
}
