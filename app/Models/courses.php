<?php

namespace App\Models;

use App\Models\favorits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
    ];

    public function favorits(){
        return $this->balongTo(favorits::class);
    }

    
}
