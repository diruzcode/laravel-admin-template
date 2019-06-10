<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'              => 'El campo :attribute debe ser aceptado.',
    'active_url'            => 'El campo :attribute no es una URL válida.',
    'after'                 => 'El campo :attribute debe ser una fecha después de :date.',
    'alpha'                 => 'El campo :attribute sólo puede contener letras.',
    'alpha_dash'            => 'El campo :attribute sólo puede contener letras, números y guiones.',
    'alpha_num'             => 'El campo :attribute sólo puede contener letras y números.',
    'array'                 => 'El campo :attribute debe ser un arreglo.',
    'before'                => 'El campo :attribute debe ser una fecha antes de :date.',
    'between'               => [
        'numeric' => 'El campo :attribute debe estar entre :min y :max.',
        'file'    => 'El campo :attribute debe estar entre :min y :max kilobytes.',
        'string'  => 'El campo :attribute debe estar entre :min y :max caracteres.',
        'array'   => 'El campo :attribute debe tener entre :min y :max elementos.',
    ],
    'boolean'               => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'             => 'El campo de confirmación de :attribute no coincide.',
    'date'                  => 'El campo :attribute no es una fecha válida.',
    'date_format'           => 'El campo :attribute no corresponde con el formato :format.',
    'different'             => 'Los campos :attribute y :other deben ser diferentes.',
    'digits'                => 'El campo :attribute debe ser de :digits dígitos.',
    'digits_between'        => 'El campo :attribute debe tener entre :min y :max dígitos.',
    'dimensions'            => 'La imagen del campo :attribute tiene dimensiones incorrectas.',
    'distinct'              => 'El campo :attribute tiene valores duplicados.',
    'email'                 => 'El campo :attribute debe contener un email válido.',
    'exists'                => 'El campo :attribute seleccionado es inválido.',
    'file'                  => 'El campo :attribute debe ser un archivo.',
    'filled'                => 'El campo :attribute es requerido.',
    'image'                 => 'El campo :attribute debe ser una imagen.',
    'in'                    => 'El campo :attribute seleccionado es inválido.',
    'in_array'              => 'El campo :attribute no existe en :other.',
    'integer'               => 'El campo :attribute debe ser un valor entero.',
    'ip'                    => 'El campo :attribute debe ser una dirección IP válida.',
    'json'                  => 'El campo :attribute debe ser una cadena JSON válida.',
    'match'                 => 'El formato del campo :attribute es inválido.',
    'max'                   => [
        'numeric' => 'El campo :attribute no debe ser mayor que :max.',
        'file'    => 'El campo :attribute no debe tener más de :max kilobytes.',
        'string'  => 'El campo :attribute no debe tener más de :max caracteres.',
        'array'   => 'El campo :attribute no debe tener más de :max elementos.',
    ],

    'mimes'                 => 'El campo :attribute debe ser un archivo de tipo :values.',
    'mimetypes'             => 'El campo :attribute debe ser un archivo de tipo :values.',
    'min'                   => [
        'numeric' => 'El campo :attribute debe tener al menos :min.',
        'file'    => 'El campo :attribute debe tener al menos :min kilobytes.',
        'string'  => 'El campo :attribute debe tener al menos :min caracteres.',
        'array'   => 'El campo :attribute debe tener al menos :min elementos.',
    ],
    'not_in'                => 'El campo :attribute seleccionado es invalido.',
    'numeric'               => 'El campo :attribute debe ser un número.',
    'present'               => 'El campo :attribute debe estar presente.',
    'regex'                 => 'El formato del campo :attribute es inválido.',
    'required'              => 'El campo :attribute es requerido.',
    'required_if'           => 'El campo :attribute es requerido.',
    'required_unless'       => 'El campo :attribute es requerido a menos que :other esté presente en :values.',
    'required_with'         => 'El campo :attribute es requerido cuando :values está presente.',
    'required_with_all'     => 'El campo :attribute es requerido cuando :values está presente.',
    'required_without'      => 'El campo :attribute es requerido cuando :values no está presente.',
    'required_without_all'  => 'El campo :attribute es requerido cuando ningún :values está presente.',
    'same'                  => 'El campo :attribute y :other deben coincidir.',
    'size'                  => [
        'numeric' => 'El campo :attribute debe ser :size.',
        'file'    => 'El campo :attribute debe tener :size kilobytes.',
        'string'  => 'El campo :attribute debe tener :size caracteres.',
        'array'   => 'El campo :attribute debe contener :size elementos.',
    ],
    'string'                => 'El campo :attribute debe ser una cadena de texto.',
    'unique'                => 'El campo :attribute ya ha sido tomado.',
    'uploaded'              => 'El campo :attribute no ha podido ser subido.',
    'url'                   => 'El formato de :attribute es inválido.',
    'timezone'              => 'El campo :attribute debe ser una zona de tiempo válida.',
    'recaptcha'             => 'El :attribute no es correcto.',



    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention 'attribute.rule' to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'news_images_min' => 'El campo :attribute debe tener al menos :min imagen.|El campo :attribute debe tener al menos :min imágenes.',
    'news_images_max' => 'El campo :attribute no debe tener más de :max imagen.|El campo :attribute no debe tener más de :max imágenes.',
    'news_documents_min' => 'El campo :attribute debe tener al menos :min documento.|El campo :attribute debe tener al menos :min documentos.',
    'news_documents_max' => 'El campo :attribute no debe tener más de :max documento.|El campo :attribute no debe tener más de :max documentos.',
    'telephone' => 'El campo :attribute no es válido.',
    'run' => 'El RUT ingresado no es válido.',
    'older_than' => 'La fecha de nacimiento ingresada no es válida.',

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of 'email'. This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'hidden'                => 'Oculto',
        'name'                  => 'Nombre',
        'password'              => 'Contraseña',
        'repeat-password'       => 'Repetir contraseña',
        'sections'              => 'Secciones',
        'status'                => 'Estado',
        'username'              => 'Usuario',
        'country_id'            => 'Nacionalidad',
        'rut'                   => 'RUN / Pasaporte / Cédula',
        'email'                 => 'Correo electrónico',
        'firstname'             => 'Nombres',
        'lastname'              => '1º Apellido',
        'mother_lastname'       => '2º Apellido',
        'phone'                 => 'Teléfono Fijo',
        'cellphone'             => 'Celular',
        'social_name'           => 'Nombre social',
        'sex_id'                => 'Genero',
        'birth_date'            => 'Fecha de nacimiento',
        'region_id'             => 'Región',
        'commune_id'            => 'Comuna',
        'status_id'             => 'Nuevo Estado',
        'comment'               => 'Comentario',
        'first_name' => 'Primer Nombre',
        'last_name' => 'Segundo Nombre',
        'father_surname' => 'Apellido Paterno',
        'mother_surname' => 'Apellido Materno',
        'message' => 'Mensaje',
        'role_id' => 'Role'
      ],

];
