<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Data;

class DataStoreRequest extends FormRequest
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
        $rules = [
            'page_uuid' => 'required|string|uuid'
        ];

        if(!Data::wherePageUuid($this->input('page_uuid'))->first()){
             $rules = array_merge($rules, [
                'page_name' => 'required|string|max:255',
                'page_content' => 'required|string|max:1256'
             ]);
        }

        return $rules;
    }
}
