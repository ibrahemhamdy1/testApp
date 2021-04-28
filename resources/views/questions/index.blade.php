@extends('layouts.app')
    @section('content')
        <div class="card">
            <h5 class="card-header">
                @lang('Categories')
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('questions.create') }}">
                        @lang('Create new question')
                    </a>
                </div>
            </h5>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">@lang('Name')</th>
                        <th scope="col">@lang('Actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <th scope="row">{{ $question->id }}</th>
                                <td>{{ $question->name }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('questions.edit', $question->id) }}">@lang('edit')</a>
                                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf()
                                        <button post="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
