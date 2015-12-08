<?php

namespace App\Repository;

use App\Bug;

class BugRepository
{
    public function fetchAll($filters = [])
    {
        if (isset($filters['status']) && $filters['status'] == 'all') {
            unset($filters['status']);
        }

        return Bug::orderBy('created_at', 'desc')
            ->where($filters)
            ->get();
    }
}
