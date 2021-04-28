<?php

namespace App\HttP\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\HttP\Requests\Concerns\FiltersValidated;

abstract class AbstractFormRequest extends FormRequest
{
    use FiltersValidated;
}
