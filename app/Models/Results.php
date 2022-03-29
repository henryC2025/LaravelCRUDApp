<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment', 'author'
    ];

    // protected $fillable = [
    //     'comment_id','comment_name','forename','surname','email','valididated','style'
    // ];
}
