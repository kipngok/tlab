<?php

namespace App\Http\Controllers;

use App\Income;
use App\Code;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
// use App\Imports\UsersImport;
use App\Exports\TransactionExport;
use App\Exports\InvalidCodeExport;
class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        //

          $codes= Code::all();
         $totalvalid = Income::whereBetween('created_at',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('cost_valid');
          $totalinvalid = Income::whereBetween('created_at',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('cost_invalid');
          $totalused = Income::whereBetween('created_at',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('cost_used');
          $totalamount=$totalvalid+$totalinvalid+$totalused;

        $incomes = Income::orderBy('created_at','desc')->paginate(8);

         return view('income.index',compact('codes','incomes','totalvalid','totalinvalid','totalused','totalamount'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
    public function notification(){
       
        $incomes= Income::all();
        $count = Income::where('cost_invalid','=','1')->count();
        return view('income.notification',compact('incomes','count'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
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
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
      // $income= Income::all();
      // $transactions= TransactionExport::all();
      // dd($transactions);
        // return Excel::download(new TransactionExport, 'Transaction-collection.xlsx');
        return Excel::download(new TransactionExport, 'Transactions-collection.xlsx');
    }    

    // public function filesExport(){
    //     return Excel::download(new InvalidCodeExport, 'InvalidCodes-collection.xlsx');
    // }
}
