<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    protected $guarded = ['id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function murid()
    {
        return $this->belongsTo(User::class, 'murid_id');
    }

    public function transactions()
    {
        return $this->hasOne(Transaction::class);
    }
}
