@extends('layouts.app')
    @section('content')
        <div class="card">
            <h5 class="card-header">@lang('Create Answer')</h5>
            <div class="card-body">
                <form action="{{ route('answers.store') }}" method="POST">
                    @csrf
                    @include('answers.form')
                    <button type="submit" class="btn btn-primary">@lang('Save')</button>
                </form>
            </div>
        </div>
    @endsection