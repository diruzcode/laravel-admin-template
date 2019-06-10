<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuraciones visuales para el administrador de contenidos.
    |--------------------------------------------------------------------------
    |
    | Estas variables definen valores que determinarán el comportamiento
    | de la interfaz gráfica del administrador de contenidos.
    |
    */

    'dashboard' => [
        'page_size'     => 10,
        'title'         => env('PAGE_TITLE', '')
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuraciones visuales para la parte publica.
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */

    'public' => [
        'page_size'             => 6,
        'default_limit'         => 3,
        'principal_news_limit'  => 3,
        'secondary_news_limit'  => 6
    ]

];
