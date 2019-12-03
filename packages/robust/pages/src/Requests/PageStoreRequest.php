<?php

namespace Robust\Page\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageStoreRequest extends FormRequest
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
            "name" => "required",
            "slug" => "unique:pages",
            "category_id" => "required",
            "excerpt" => "max:250",
            "content" => "required"
        ];
    }
}
