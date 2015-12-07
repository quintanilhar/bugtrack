<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    const LOW = 1;
    const NORMAL = 2;
    const HIGH = 3;
    const URGENT = 4;
}
