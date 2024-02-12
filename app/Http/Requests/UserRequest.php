<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
      'email' => 'required|min:11',
      'rol' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'email.required' => 'El email es obligatorio',
      'rol.required' => 'El rol es obligatorio',
      'email.min' => 'El mínimo es de 11 caracteres'
    ];
  }
}
