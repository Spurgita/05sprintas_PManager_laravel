<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->belongsTo('App\Models\Projects');
    }
}
