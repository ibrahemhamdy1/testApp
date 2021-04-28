<div class="row">
    <div class="form-group col-md-4">
        <label for="exampleInputName">@lang('Name')</label>
        <input
            type="text"
            name="name"
            class="form-control"
            required
            value="{{ old('name', $exam->name ?? '') }}"
        >
    </div>
    <div class="form-group col-md-4">
        <label for="exampleInputName">@lang('Email')</label>
        <input
            type="email"
            name="email"
            class="form-control"
            required
            value="{{ old('email', $exam->email ?? '') }}"
        >
    </div>
    <div class="form-group col-md-4">
        <label for="exampleInputName">@lang('Exam available minutes')</label>
        <input
            type="number"
            name="available_minutes"
            class="form-control"
            required
            value="{{ old('available_minutes', $examAvailableMinutes ?? '') }}"
        >
    </div>
    <div class="form-group col-md-4">
        <label for="exampleInputName">@lang('How many questions in the exam')</label>
        <input
            type="number"
            name="questions_count"
            class="form-control"
            required
            value="{{ old('questions_count', $exam->questions_count ?? '') }}"
        >
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlSelect1">@lang('Select category')</label>
        <select class="form-control" name="categories[]" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if(isset($exam) && $exam->categories->contains($category)) selected @endif >
                    #{{ $category->id }} - {{ mb_strimwidth($category->name , 0, 30, '...') }}
                </option>
            @endforeach
        </select>
    </div>
</div>
