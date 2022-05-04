<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'id',
        'title',
        'authors',
        'description',
        'released_at',
        'cover_image',
        'pages',
        'language_code',
        'isbn',
        'in_stock' ,
        'created_at',
        'updated_at',
    ];
    
    public function genres(){
        return $this->belongsToMany(Genre::class)->withTimestamps();
    }
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }


    public function activeBorrows()
    {
        // return $this->getAllBorrows()->where('status', '=', 'ACCEPTED');
        return $this->borrows()->where('status', '=', 'ACCEPTED');
    }

   


}
