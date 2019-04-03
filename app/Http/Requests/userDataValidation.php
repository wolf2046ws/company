<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userDataValidation extends FormRequest
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
            //

            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100'

        ];
    }




    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
     /*
    public function messages()
    {
        return [
            'first_name.required' => 'your name is required'
        ];
    }*/

}
