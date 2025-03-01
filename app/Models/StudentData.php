<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    protected $fillable = ['gender', 'birth_date', 'school_year', 'field_of_study', 'current_school', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
