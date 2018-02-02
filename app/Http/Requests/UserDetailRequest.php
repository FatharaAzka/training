<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailRequest extends FormRequest
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
            'user_id' => 'required|unique:user_details,user_id',
            'jk' => 'required|in:l,p',
            'no_telp' => 'required|min:10|max:13',
            'alamat' => 'required',
            'avatar' => 'sometimes|image|mimes:jpeg,png,gif|min:1',
        ];
    }
}
