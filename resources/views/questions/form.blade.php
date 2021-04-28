<div class="form-group">
    <label for="exampleInputName">@lang('Question')</label>
    <textarea name="name"class="form-control" cols="30" rows="10">{{ old('name', $question->name ?? '') }}</textarea>
</div>
<div class="anwser-input-div">
    @if (isset($question))
        @foreach ($question->answers as $answer)
            <div class="form-group anwser-input-form">
                <label for="exampleInputName">Answer
                    <a href="#" class="text-danger delete-answer">X</a>
                </label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="right_answer[]" @if($answer->right_answer) checked @endif>
                    <label class="form-check-label">@lang('Right answer')</label>
                </div>
                <textarea name="answer[]"class="form-control" cols="30" rows="10">{{ $answer->title }}</textarea>
            </div>
        @endforeach
    @else
        <div class="form-group anwser-input-form">
            <label for="exampleInputName">Answer</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="right_answer[]">
                <label class="form-check-label">@lang('Right answer')</label>
            </div>
            <textarea name="answer[]"class="form-control" cols="30" rows="10"></textarea>
        </div>
    @endif
</div>

<div class="form-group float-right">
    <a href="#" class="btn btn-success add-new-answer-input">Add new answer</a>
</div>

</br>

<div class="form-group">
    <label for="exampleFormControlSelect1">@lang('Select category')</label>

    <select class="form-control" name="category">
        <option value="">
            @lang('Noting selected')
         </option>

        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if(isset($question) && $question->category == $category) selected @endif >
                #{{ $category->id }} - {{ mb_strimwidth($category->name , 0, 30, '...') }}
            </option>
        @endforeach
    </select>
</div>