@extends('layouts.app')
    @section('content')
        <div class="card">
            <h5 class="card-header">@lang('Edit question')</h5>
            <div class="card-body">
                <form action="{{ route('questions.update', $question->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('questions.form')
                    <button type="submit" class="btn btn-primary">@lang('Update')</button>
                </form>
            </div>
        </div>
    @endsection