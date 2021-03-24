<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\Product;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalvalid = Income::whereBetween('created_at',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('cost_valid');
          $totalinvalid = Income::whereBetween('created_at',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('cost_invalid');
          $totalused = Income::whereBetween('created_at',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('cost_used');
          $totalamount=$totalvalid+$totalinvalid+$totalused;
           $totalproducts=Product::all()->count();

        $incomes = Income::orderBy('created_at','desc')->paginate(10);
        return view('home',compact('incomes','totalvalid','totalinvalid','totalused','totalamount','totalproducts'));
        
    }
}
