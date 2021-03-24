<?php

namespace App\Exports;
use App\Product;
use App\Code;
use App\Category;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InactiveCodesExport implements FromQuery,WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
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
public function map($codes): array
    {
        return [
            $codes->id,
            $codes->code,
            $codes->product_id->product_name,
            $codes->status,
            Date::dateTimeToExcel($codes->created_at),
            Date::dateTimeToExcel($codes->updated_at),
            $codes->consumed_by,
            $codes->date_time,
            
        ];
    }
}
