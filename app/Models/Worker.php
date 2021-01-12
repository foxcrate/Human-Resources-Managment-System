<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    public function attendances()
    {
        return $this->belongsToMany(Attendance::class,'workers_attendances');
    }

    public function pasts()
    {
        return $this->belongsToMany(Past::class,'workers_pasts');
    }

}
