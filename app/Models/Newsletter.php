<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = ['user_id','email'];

    protected function user(){
        return $this->belongsTo(User::class);
    }
}
