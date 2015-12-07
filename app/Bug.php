<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    const STATUS_NEW = 1;

    protected $fillable = ['title', 'description', 'priority_id', 'product_id'];

    protected $attributes = array(
        'engineer_id' => null,
        'status' => self::STATUS_NEW
    );

    public function priority()
    {
        return $this->hasOne(Priority::class);
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }
}
