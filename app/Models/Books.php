<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','image','avaliable_quantity','price','discount', 
    'author_id','created_by','updated_by'];
    public function authors()
    {
        return $this->belongsToMany(Authors::class);
    }
}
