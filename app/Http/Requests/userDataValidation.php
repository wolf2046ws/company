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
            'last_name' => 'required|max:100',
            'gender'=> 'required|in:male,female',
            'contract_start' => 'required',
            'contract_end' => 'required' ,
            'department_id' => 'required|exists:departments,id',
            'company_id' => 'required|exists:companies,id',
            'resort_id' => 'required|exists:resorts,id',
            "softwares"    => "required|array",
            "softwares.*"  => "required|string|distinct|exists:software,id",

            "hardwares"    => "required|array",
            "hardwares.*"  => "required|string|distinct|exists:hardware,id",

            "access_files"    => "required|array",
            "access_files.*"  => "required|string|distinct|exists:access_files,id"

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
