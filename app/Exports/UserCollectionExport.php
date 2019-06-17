<?php

namespace App\Exports;


use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class UserCollectionExport implements FromCollection
{
    use Exportable;

    public function collection()
    {
        return User::all();
    }
}
