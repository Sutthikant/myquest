<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Model relation-----------------------------
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function todo()
    {
        return $this->hasMany(Todo::class);
    }
}
