<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

// class UsersExport implements FromCollection

class UsersExport implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

public function headings(): array
    {
        return [
            'Id',
            'name',
            'email',
            'createdAt',
            'updatedAt',
        ];
    }
public function query(){
	return User::query()->whereRaw('is_admin = 1');
}
public function map($users): array
    {
        return [
            $users->id,
            $users->name,
            $users->email,
            Date::dateTimeToExcel($users->created_at),
            Date::dateTimeToExcel($users->updated_at),
        ];
    }

}
