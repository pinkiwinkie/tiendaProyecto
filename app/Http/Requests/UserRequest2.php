<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest2 extends FormRequest
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
      'name' => 'required|min:3',
      'surname' => 'required|min:3',
      'password' => 'min:4',
      'rol' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'email.required' => 'El email es obligatorio',
      'rol.required' => 'El rol es obligatorio',
      'password.required' => 'La contraseña es obligatoria',
      'name.required' => 'El nombre es obligatorio',
      'surname.required' => 'El apellido es obligatorio',
      'email.min' => 'El mínimo es de 11 caracteres',
      'name.min' => 'El mínimo es de 3 caracteres',
      'surname.min' => 'El mínimo es de 3 caracteres',
      'password.min' => 'El mínimo es de 4 caracteres'
    ];
  }
}
