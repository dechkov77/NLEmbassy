<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'profile_picture'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class, 'user_courses');
    }

    public function studentData(){
        return $this->hasOne(StudentData::class, 'user_id');
    }

    public function professorData(){
        return $this->hasOne(ProfessorData::class, 'user_id');
    }

    public function achievements(){
        return $this->belongsToMany(Achievement::class, 'user_achievements', 'user_id', 'achievement_id');
    }

    public function interests(){
        return $this->belongsToMany(Interest::class, 'student_interests', 'user_id', 'interest_id');
    }

    public function newsLetter(){
        return $this->belongsTo(Newsletter::class);
    }

    public function progress(){
        return $this->hasMany(UserProgress::class);
    }




}
