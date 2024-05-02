<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Model relation---------------------------------
    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

}
