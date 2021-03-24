<?php

namespace App\Exports;
use App\Product;
use App\Code;
use App\Category;
use App\Income;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvalidCodeExport implements FromQuery,WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
// 'id','cost_valid', 'cost_invalid', 'cost_used', 'notification', 'created_at', 'updated_at', 'code_id', 'invalid_code', 'consumed_by', 'status'

public function headings(): array
    {
        return [
            'id',
            'code',
            'product_id',
            'status',
            'updated_at',
            'created_at',
            'consumed_by',
            'date_time',
        ];
    }

    public function query(){
	return Code::query()->where('status','inactive');
	// return Code::query()->whereRaw('status = active');
}
public function map($incomes): array
    {
        return [
            $incomes->id,
            $incomes->code,
            $incomes->product_id->product_name,
            $incomes->status,
            Date::dateTimeToExcel($incomes->created_at),
            Date::dateTimeToExcel($incomes->updated_at),
            $incomes->consumed_by,
            $incomes->date_time,
            
        ];
    }
}
