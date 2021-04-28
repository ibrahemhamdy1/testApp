@extends('layouts.app')
    @section('content')
        <div class="card">
            <h5 class="card-header">@lang('Edit Answer')</h5>
            <div class="card-body">
                <form action="{{ route('answers.update', $answer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('answers.form')
                    <button type="submit" class="btn btn-primary">@lang('Update')</button>
                </form>
            </div>
        </div>
    @endsection