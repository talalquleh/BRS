<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'style',
        'create_at',
        'updated_at',
    ];
    public function books()
    {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }
}
