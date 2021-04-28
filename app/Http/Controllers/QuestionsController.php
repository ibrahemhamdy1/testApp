<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Http\Requests\Questions\Store;
use App\Http\Requests\Questions\Update;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the questions.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $questions = Question::get();

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new question.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $answers = Answer::doesntHave('question')->get();
        $categories = Category::get();

        return view('questions.create', compact('answers', 'categories'));
    }

    /**
     * Store a newly created Question in storage.
     *
     * @param  \App\Http\Requests\Categories\Store  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Store $request)
    {
        $question = Question::create($request->validated());
        $question->category()->associate($request->validatedValue('category'))->save();

        foreach (array_filter($request->validatedValue('answer')) as $key => $answer) {
            Answer::create([
                'title' => $answer,
                'question_id' => $question->id,
                'right_answer' => isset($request->validatedValue('right_answer')[$key]) ? 1 : 0,
            ]);
        }

        flash(__('The question has been created successfully'))->success();

        return redirect()->route('questions.index');
    }

    /**
     * Show the form for editing the specified question.
     *
     * @param  \App\Question  $question
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $answers = Answer::doesntHave('question')->get();
        $categories = Category::get();

        if ($question->answers) {
            $answers->push($question->answers);
        }

        return view('questions.edit', compact('question', 'answers', 'categories'));
    }

    /**
     * Update the specified question in storage.
     *
     * @param  \App\Http\Requests\Categories\Update  $request
     * @param  \App\Question  $question
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Update $request, Question $question)
    {
        $question->update($request->validatedExcept(['answer', 'category', 'right_answer']));
        $question->category()->associate($request->validatedValue('category'))->save();
        $question->answers->each->delete();

        foreach (array_filter($request->validatedValue('answer')) as $key => $answer) {
            Answer::create([
                'title' => $answer,
                'question_id' => $question->id,
                'right_answer' => isset($request->validatedValue('right_answer')[$key]) ? 1 : 0,
            ]);
        }

        flash(__('The question has been updated successfully'))->success();

        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified question from storage.
     *
     * @param  \App\Question  $question
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Question $question)
    {
        $question->answers->each->delete();

        $question->delete();

        flash(__('The question has been deleted successfully'))->success();

        return redirect()->route('questions.index');
    }
}
