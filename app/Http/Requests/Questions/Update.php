<?php

namespace App\Http\Requests\Questions;

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
            'name' => 'required|string|max:255|unique:questions,name,' . $this->question->id,
            'answer' => 'required|array',
            'right_answer' => 'array',
            'category' => 'nullable|exists:categories,id'
        ];
    }
}
