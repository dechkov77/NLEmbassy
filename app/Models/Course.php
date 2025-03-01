<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'description', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function modules(){
        return $this->hasMany(Module::class);
    }

    public function professors(){
        return $this->belongsTo(User::class, 'course_professor');
    }

}
