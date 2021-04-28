<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'start_time',
        'end_time',
        'questions_count',
        'link',
        'ip',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withPivot('answer_ids');;
    }
}
