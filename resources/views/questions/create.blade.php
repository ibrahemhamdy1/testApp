@extends('layouts.app')
    @section('content')
        <div class="card">
            <h5 class="card-header">@lang('Create question')</h5>
            <div class="card-body">
                <form action="{{ route('questions.store') }}" method="POST">
                    @csrf
                    @include('questions.form')
                    <button type="submit" class="btn btn-primary">@lang('Save')</button>
                </form>
            </div>
        </div>
    @endsection