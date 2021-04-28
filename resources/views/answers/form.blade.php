<div class="form-group">
    <label for="exampleInputName">Name</label>
    <textarea name="title"class="form-control" cols="30" rows="10">{{ old('title', $answer->title ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="exampleFormControlSelect1">@lang('Select question')</label>
    <select class="form-control" name="question">
        <option value="">
           @lang('Noting selected')
        </option>
        @foreach ($questions as $question)
            <option value="{{ $question->id }}" @if(isset($answer) && $answer->question == $question) selected @endif >
                #{{ $question->id }} - {{ mb_strimwidth($question->name , 0, 30, '...') }}
            </option>
        @endforeach
    </select>
</div>