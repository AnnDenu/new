<?php

namespace App\Models;

use App\Models\courses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorits extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_users',
        'id_courses',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
    public function courses() {
        return $this->hasMany(courses::class);
    }
}
