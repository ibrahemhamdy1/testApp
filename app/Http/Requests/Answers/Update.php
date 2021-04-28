<?php

namespace App\Http\Requests\Answers;

use App\HttP\Requests\AbstractFormRequest;

class Update extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255|unique:answers,title,' . $this->answer->id,
            'question' => 'nullable|exists:questions,id'
        ];
    }
}
