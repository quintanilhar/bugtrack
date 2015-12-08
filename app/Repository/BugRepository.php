<?php

namespace App\Repository;

use App\Bug;

class BugRepository
{
    public function fetchAll()
    {
        return Bug::orderBy('created_at', 'desc')
            ->get();
    }
}
