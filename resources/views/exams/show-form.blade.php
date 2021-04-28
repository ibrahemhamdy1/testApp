@foreach ($exam->questions as $key => $question)
    <div class="card">
        <h5 class="card-header">
            <label for="font-weight-bold">{{ $question->name }}</label>
        </h5>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-12">
                    <div class="ml-5">
                        <div class="row">
                            @foreach ($question->answers as $answer)
                                <div class="form-check col-6">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        name="answers[{{ $question->id }}][{{ $answer->id }}]"
                                        @if(in_array($answer->id, $question->pivot->answer_ids ? json_decode($question->pivot->answer_ids) : [] )) checked @endif
                                    >
                                    <label class="form-check-label"><p>{{ $answer->title }}</p></label>
                                </div>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endforeach
