@extends('layouts.app')
    @section('content')
    <div class="card">
        <h5 class="card-header">
            @lang('Categories')

            <div class="float-right">
                <a class="btn btn-success" href="{{ route('categories.create') }}">
                    @lang('Create new category')
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
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('categories.edit', $category->id) }}">@lang('edit')</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
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
