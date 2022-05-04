<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'book_id',
        'status',
        'request_processed_at',
        'request_managed_by',
        'deadline',
        'returned_at',
        'return_managed_by',
        'created_at',
        'updated_at',
    ];
    // public function books(){

    //     $this->hasMany(Book::class);
    // }

    public function book(){
        return $this->belongsTo(Book::class);
    }
    
    public function user(){

       return $this->belongsTo(User::class);
    }


}
