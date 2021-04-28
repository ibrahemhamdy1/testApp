<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    /**
     * The fillable columns.
     *
     * @var array
     */
    protected $fillable = ['title', 'question_id', 'right_answer'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
