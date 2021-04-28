<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Http\Requests\Answers\Store;
use App\Http\Requests\Answers\Update;

class AnswersController extends Controller
{
    /**
     * Display a listing of the answers.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $answers = Answer::get();

        return view('answers.index', compact('answers'));
    }

    /**
     * Show the form for creating a new answer.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $questions = Question::get();

        return view('answers.create', compact('questions'));
    }

    /**
     * Store a newly created Answer in storage.
     *
     * @param  \App\Http\Requests\Answers\Store  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Store $request)
    {
        $answer = Answer::create($request->validatedExcept('question'));
        $answer->question()->associate($request->validatedValue('question'))->save();

        flash(__('The answer has been created successfully'))->success();

        return redirect()->route('answers.index');
    }

    /**
     * Show the form for editing the specified answer.
     *
     * @param  \App\Answer  $answer
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        $questions = Question::get();

        return view('answers.edit', compact('answer', 'questions'));
    }

    /**
     * Update the specified answer in storage.
     *
     * @param  \App\Http\Requests\Answers\Update  $request
     * @param  \App\Answer  $answer
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Update $request, Answer $answer)
    {
        $answer->update($request->validatedExcept('question'));

        flash(__('The answer has been updated successfully'))->success();
        $answer->question()->associate($request->validatedValue('question'))->save();

        return redirect()->route('answers.index');
    }

    /**
     * Remove the specified answer from storage.
     *
     * @param  \App\Answer  $answer
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();

        flash(__('The answer has been deleted successfully'))->success();

        return redirect()->route('answers.index');
    }
}
