<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidationRequest extends FormRequest
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
            'email' => 'required|max:30',
            'password' => 'required|min:6',
        ];
    }


    /**
     * Error Massage
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'please give your email',
            'email.max' => 'maximum 30 character supported',
            'password.required' => 'please give your password',
            'password.min' => 'minimum 6 character required'
        ];
    }

}
