<?php

namespace App\Exports;


use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;

class UserMappingExport implements FromQuery, WithMapping
{
    use Exportable;

    public function query()
    {
        return User::query();
    }


    public function map($model): array
    {
        return [
            $model->id,
            $model->created_at
        ];
    }

}
