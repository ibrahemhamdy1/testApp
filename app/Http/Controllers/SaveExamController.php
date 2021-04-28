<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;

class SaveExamController extends Controller
{
    public function show(Request $request, Exam $exam)
    {
        if (now()->timestamp > strtotime($exam->end_time)) {
            return abort(404);
        }

        if (empty($exam->ip)) {
            $exam->update(['ip' => $request->ip()]);
        }

        if ($request->ip() !== $exam->ip) {
            return abort(401);
        }

        return view('exams.show', compact('exam'));
    }

    public function update(Request $request, Exam $exam)
    {
        foreach ($request->answers as $question => $answer) {
            $examQuestion = ExamQuestion::where('exam_id', $exam->id)->where('question_id', $question)->first();

            $examQuestion->update([
                'answer_ids' => json_encode(array_keys($answer)),
            ]);
        }

        flash('Your answers has been saved successfully')->success();

        return view('exams.after-exam');
    }
}
