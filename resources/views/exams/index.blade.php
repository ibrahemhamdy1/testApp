@extends('layouts.app')
    @section('content')
        <div class="card">
            <h5 class="card-header">
                @lang('Categories')
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('exams.create') }}">
                        @lang('Create new exam')
                    </a>
                </div>
            </h5>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">@lang('Name')</th>
                        <th scope="col">@lang('Email')</th>
                        <th scope="col">@lang('Link')</th>
                        <th scope="col">@lang('ip')</th>
                        <th scope="col">@lang('Actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($exams as $exam)
                            <tr>
                                <th scope="row">{{ $exam->id }}</th>
                                <td>{{ $exam->name }}</td>
                                <td>{{ $exam->email }}</td>
                                <th scope="col">{{ route('take-exams.show', $exam->id) }}</th>
                                <td>{{ $exam->ip }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('exams.show', $exam->id) }}">@lang('Show')</a>
                                    <a class="btn btn-warning" href="{{ route('exams.edit', $exam->id) }}">@lang('Edit')</a>
                                    <form action="{{ route('exams.destroy', $exam->id) }}" method="POST" class="d-inline">
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
