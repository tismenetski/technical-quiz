<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;


    protected $table = 'Users_Answers';

    protected $fillable = [

        'user_id',
        'question_id' ,
        'category_id',
        'read' ,
        'answered',

    ];

}
