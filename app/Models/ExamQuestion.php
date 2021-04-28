<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamQuestion extends Model
{
    use HasFactory;

    protected $table = 'exam_question';

    protected $fillable = [
        'question_id',
        'answer_ids',
        'exam_id',
    ];
}
