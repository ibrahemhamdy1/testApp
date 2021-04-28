@extends('layouts.app')
    @section('content')
        <div class="card">
            <h5 class="card-header">@lang('Exam') | <small> {{ $exam->name . ' (' . $exam->email . ')' }}</small></h5>
            <div class="card-body">
                <form action="{{ route('save-exam', $exam->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('exams.show-form')
                    <button type="submit" class="btn btn-primary">@lang('Update')</button>
                </form>
            </div>
        </div>
    @endsection