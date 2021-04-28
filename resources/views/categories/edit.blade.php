@extends('layouts.app')
    @section('content')
        <div class="card">
            <h5 class="card-header">@lang('Edit Category')</h5>
            <div class="card-body">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('categories.form')
                    <button type="submit" class="btn btn-primary">@lang('Update')</button>
                </form>
            </div>
        </div>
    @endsection