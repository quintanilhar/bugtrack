<?php

namespace App\Repository;

use App\Bug;

class BugRepository
{
    public function fetchAll(array $filters = [])
    {
        $filters = $this->normalizeFilters($filters);

        return Bug::orderBy('created_at', 'desc')
            ->where($filters)
            ->get();
    }

    public function fetchContainers()
    {
        return [
            'opened' => Bug::where('status', Bug::OPENED)->count(),
            'closed' => Bug::where('status', Bug::CLOSED)->count(),
            'all' => Bug::count()
        ];
    }

    private function normalizeFilters(array $filters)
    {
        if (isset($filters['status']) && $filters['status'] == 'all') {
            unset($filters['status']);
        }

        foreach ($filters as $key => $filter) {
            if (empty($filter)) {
                unset($filters[$key]);
            }
        }

        return $filters;
    }
}
