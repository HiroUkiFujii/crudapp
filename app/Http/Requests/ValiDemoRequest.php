<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValiDemoRequest extends FormRequest
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
          'name'=>'required',
          'email'=>'email|required',
          'tel'=>'numeric',
        ];
    }

    public function messages()
    {
      return[
        "required"=>"必須項目である",
        "email"=>"半角での入力をお願いします",
        "numeric"=>"半角での入力をお願いします",
      ];
    }
}
