<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\InactiveCodesImport;
use App\Exports\InactiveCodesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Company;
use App\Product;
use App\Category;
use App\Code;
use DB;
class InactiveproductcodesController extends Controller
{
    //

    public function index()
{  


	// $products= Product::all();
	// $codes= Code::all();

    $products= DB::table('products')->join('codes', 'products.id', '=', 'codes.product_id')
    ->select('products.*','code','status')
    ->where('status', 'inactive')
    ->orderBy('id', 'asc')
    ->get();
  
 $page = Code::orderBy('created_at','desc')->paginate(6);
   return view('reports.inactive',compact('products','page'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
  
}

  public function fileImportExport()
    {
       return view('file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new ActiveCodesImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {

    // $products= DB::table('products')->join('codes', 'products.id', '=', 'codes.product_id')
    // ->select('products.*','code','status')
    // ->where('status', 'active')
    // ->orderBy('id', 'asc')
    // ->get();
    // return Excel::download( new UsersEarningHistory($history->get()), $date.'history.xls');
      // return Excel::download( new ActiveCodesExport($products->get()),'Active-collection.');
        return Excel::download(new InactiveCodesExport, 'Inactive-collection.xlsx');
    }    

}
