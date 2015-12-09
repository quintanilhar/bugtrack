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

    public function fetchContainers($filters = [])
    {
        unset($filters['status']);

        return [
            'opened' => Bug::where('status', Bug::OPENED)->count(),
            'closed' => Bug::where('status', Bug::CLOSED)->count(),
            'all' => Bug::count()
        ];
    }
}
