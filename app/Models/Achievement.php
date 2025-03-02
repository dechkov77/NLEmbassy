<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = ['name', 'description'];

    public function user(){
        return $this->belongsToMany(User::class, 'user_achievements', 'user_id', 'achievement_id');
    }
}
