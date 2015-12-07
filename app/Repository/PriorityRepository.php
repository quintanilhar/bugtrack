<?php

namespace App\Repository;

use App\Priority;

class PriorityRepository
{
    public function fetchAll()
    {
        return Priority::orderBy('id', 'asc')
            ->get();
    }
}
