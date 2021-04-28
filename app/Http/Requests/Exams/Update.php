<?php

namespace App\Http\Requests\Exams;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'available_minutes' => 'required|integer',
            'questions_count' => 'required|integer',

            'categories' => 'required|array',
            'categories.*' => 'nullable|integer|exists:categories,id',
        ];
    }
}
