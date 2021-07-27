<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;


    protected $fillable = [
        'original_id',
        'question',
        'multiple_answer_question',
        'description',
        'tip',
        'explanation',
        'difficulty',
        'answers',
        'category',
        'tags',
        'category_id',
        'tag_id',
        'correct_answers'

    ];


    public function category() {
        return $this->hasOne(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class,'questions_tags');

    }

    public function user() {
        return $this->belongsToMany(User::class,'users_answers');
    }
}
