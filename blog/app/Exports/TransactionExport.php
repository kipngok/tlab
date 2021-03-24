<?php

namespace App\Exports;
use App\Income;
use App\Code;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   public function headings(): array
    {
        return [
           'id','cost_valid', 'cost_invalid', 'cost_used', '', 'created_at', 'updated_at', 'code_id', 'invalid_code', 'consumed_by', 'status',
        ];
    }
 public function query()
    {
        return Income::query();

    }
    public function map($incomes): array
    {
        return [
            $incomes->id,
            $incomes->cost_valid,
            $incomes->cost_used,
            Date::dateTimeToExcel($incomes->created_at),
            Date::dateTimeToExcel($incomes->updated_at),
        ];
    }

}


