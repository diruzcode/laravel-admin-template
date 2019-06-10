<?php

namespace App\Http\Requests;

use App\User;
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
        if ($this->isMethod('patch')) {
          $id = $this->input('id');
          $user = User::findOrFail($id);
        }

        return $this->user()->can(['crear-usuarios', 'editar-usuarios']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'rut'   => 'required',
            'first_name'   => 'required',
            'father_surname'  => 'required',
            'email'             => 'required|email|unique:users,email',
            'role_id'   => 'required',
            'password'  => 'required_without:id|confirmed|min:8|max:30'
        ];

        if ($this->id){
          $rules = array_merge(
              $rules,
              [
                'email'  => 'required|email|unique:users,email,'.$this->user,
              ]
          );
        }



        return $rules;
    }


    public function messages()
    {
        return [
            'password.required_without' => 'El campo contraseña es obligatorio cuando no es una actualización.'
        ];
    }
}
