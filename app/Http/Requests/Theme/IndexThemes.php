<?php

namespace App\Http\Requests\Theme;

use App\Http\Requests\ApiRequest;
use Tipoff\EscapeRoom\Models\EscaperoomTheme;

class IndexThemes extends ApiRequest
{
    /**
     * Get model class name.
     *
     * @return string
     */
    public function getModelClass()
    {
        return EscaperoomTheme::class;
    }

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
            //
        ];
    }
}
