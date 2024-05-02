<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'reward', 'user_id'];

    //Model relation-----------------------------
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    //Business logic------------------------------
    public function isAllowedToEdit(User $user): bool
    {
        if ($user == null) {
            return false;
        }

        if ($user->superadmin) {
            return true;
        }

        return $user->id == $this->user_id;
    }
}
