<?php

namespace App\Repository;

use App\User;

class UserRepository
{
    public function fetchAllReporters(array $filters = [])
    {
        $queryBuilder = User::has('reports')
            ->orderBy('name')
            ->limit(20);

        if (isset($filters['name'])) {
            $queryBuilder->where('name', 'like', '%' . $filters['name'] . '%');
        }
            
        return $queryBuilder->get();
    }
}
