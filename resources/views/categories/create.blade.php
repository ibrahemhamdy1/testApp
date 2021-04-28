@extends('layouts.app')
    @section('content')
        <div class="card">
            <h5 class="card-header">@lang('Create Category')</h5>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    @include('categories.form')
                    <button type="submit" class="btn btn-primary">@lang('Save')</button>
                </form>
            </div>
        </div>
    @endsection