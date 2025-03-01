<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['title', 'content','video_url','order_number', 'module_id'];

    public function module(){
        return $this->belongsTo(Module::class);
    }

    public function views(){
        return $this->belongsTo(View::class);
    }

    public function progress(){
        return $this->hasMany(UserProgress::class);
    }
}
