@extends('layouts.app')
    @section('content')
        <div class="card">
            <h5 class="card-header">@lang('Edit an exam')</h5>
            <div class="card-body">
                <form action="{{ route('exams.update', $exam->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('exams.form')
                    <button type="submit" class="btn btn-primary">@lang('Update')</button>
                </form>
            </div>
        </div>
    @endsection