<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessorData extends Model
{
    protected $fillable = ['position', 'company', 'gender', 'birth_date', 'work_experience_years', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    

}
