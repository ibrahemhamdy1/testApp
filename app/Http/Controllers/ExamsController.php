<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Exam;
use App\Models\Category;
use App\Models\Question;
use App\Models\ExamQuestion;
use App\Http\Requests\Exams\Store;
use App\Http\Requests\Exams\Update;

class ExamsController extends Controller
{
    /**
     * Display a listing of the exams.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $exams = Exam::get();

        return view('exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new exam.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::get();

        return view('exams.create', compact('categories'));
    }

    /**
     * Store a newly created Exam in storage.
     *
     * @param  \App\Http\Requests\Exams\Store  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Store $request)
    {
        $data = array_merge([
            'start_time' => now()->toDateTimeString(),
            'end_time' => now()->addMinutes($request->validatedValue('available_minutes'))->toDateTimeString(),
            'link' => 'url',
        ], $request->validatedExcept(['available_minutes', 'categories']));

        $exam = Exam::create($data);
        $exam->categories()->sync($request->validatedValue('categories'));

        $questions = Question::whereHas('category', function ($query) use ($request) {
            return $query->whereIn('id', $request->validatedValue('categories'));
        })->limit($request->validatedValue('questions_count'))->get();

        foreach ($questions as $question) {
            ExamQuestion::create([
                'question_id' => $question->id,
                'exam_id' => $exam->id,
            ]);
        }

        flash(__('The exam has been created successfully'))->success();

        return redirect()->route('exams.index');
    }

    public function show(Exam $exam)
    {
        return view('exams.results', compact('exam'));
    }

    /**
     * Show the form for editing the specified exam.
     *
     * @param  \App\Exam  $exam
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        $questions = Question::get();
        $categories = Category::get();
        $examAvailableMinutes = Carbon::parse($exam->start_time)->diffInMinutes($exam->end_time);

        return view('exams.edit', compact('exam', 'categories', 'examAvailableMinutes'));
    }

    /**
     * Update the specified exam in storage.
     *
     * @param  \App\Http\Requests\Exams\Update  $request
     * @param  \App\Exam  $exam
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Update $request, Exam $exam)
    {
        $data = array_merge([
            'start_time' => now()->toDateTimeString(),
            'end_time' => now()->addMinutes($request->validatedValue('available_minutes'))->toDateTimeString(),
            'link' => 'url',
        ], $request->validatedExcept(['available_minutes', 'categories', 'questions_count']));

        $exam->update($data);

        $exam->categories()->sync($request->validatedValue('categories'));

        $questions = Question::whereHas('category', function ($query) use ($request) {
            return $query->whereIn('id', $request->validatedValue('categories'));
        })->limit($request->validatedValue('questions_count'))->get();
        $exam->questions()->sync([]);

        foreach ($questions as $question) {
            ExamQuestion::create([
                'question_id' => $question->id,
                'exam_id' => $exam->id,
            ]);
        }

        flash(__('The e$exam has been updated successfully'))->success();

        return redirect()->route('exams.index');
    }

    /**
     * Remove the specified exam from storage.
     *
     * @param  \App\Exam  $exam
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Exam $exam)
    {
        $exam->categories()->sync([]);

        $exam->questions()->sync([]);
        $exam->delete();

        flash(__('The exam has been deleted successfully'))->success();

        return redirect()->route('exams.index');
    }
}
