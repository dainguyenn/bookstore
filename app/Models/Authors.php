<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'avatar',
        'dob',
        'address',
        'story',
        'created_by',
        'updated_by',
    ];
     
    public function books()
    {
        return $this->hasMany(Books::class);
    }
}