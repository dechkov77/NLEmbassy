<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = ['name', 'description'];


    public function users(){
        return $this->hasMany(User::class);
    }
}
