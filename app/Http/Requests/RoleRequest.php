<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name'          => 'required|min:3|max:250|unique:roles',
            'display_name'  => 'min:3|max:250',
            'description'   => 'min:3|max:250',
            'hidden'        => 'sometimes|required|boolean',
            'permission_id' => 'required|array|min:1'
        ];

        /*
         * Verifico si estoy haciendo un update y agrego las reglas que se necesiten.
         *
         * Por ejemplo el email debo validar que no se este usando pero dejando fuera
         * de la validación al registro que se esta editando.
         */
        if ($this->isMethod('patch') OR $this->isMethod('put')){
            $rules = array_merge(
                $rules,
                [
                    'name'  => 'required|min:3|max:250|unique:roles,id,'.$this->role,
                ]
            );
        }

        return $rules;
    }
}
