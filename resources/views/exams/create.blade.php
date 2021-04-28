@extends('layouts.app')
    @section('content')
        <div class="card">
            <h5 class="card-header">@lang('Create an exam')</h5>
            <div class="card-body">
                <form action="{{ route('exams.store') }}" method="POST">
                    @csrf
                    @include('exams.form')
                    <button type="submit" class="btn btn-primary">@lang('Save')</button>
                </form>
            </div>
        </div>
    @endsection