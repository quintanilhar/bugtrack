<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    const OPENED = 'opened';
    const CLOSED = 'closed';
    const REOPENED = 'reopened';

    protected $fillable = ['title', 'description', 'priority_id', 'product_id'];

    protected $attributes = array(
        'engineer_id' => null,
        'status' => self::OPENED
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
