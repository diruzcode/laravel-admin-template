<?php

namespace App\Exports;


use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class UserQueryExport implements FromQuery
{
    use Exportable;

    public function query()
    {
        return User::query();
    }
}
