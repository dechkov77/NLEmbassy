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
        return $this->hasMany(Course::class);
    }

    public function studentData(){
        return $this->belongsTo(StudentData::class);
    }

    public function professorData(){
        return $this->belongsTo(ProfessorData::class);
    }

    public function achievements(){
        return $this->hasMany(Achievement::class);
    }

    public function interests(){
        return $this->hasMany(Interest::class);
    }

    public function newsLetter(){
        return $this->belongsTo(Newsletter::class);
    }

    public function progess(){
        return $this->hasMany(UserProgress::class);
    }




}
