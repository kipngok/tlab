<?php

namespace App\Http\Controllers;
use App\Company;
use App\Product;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $products= Product::all();
        $companys = Company::orderBy('created_at','desc')->paginate(10);
        return view('company.index',compact('companys','products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        // return view('company.index',compact('companys','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $companys = Company::all();
        return view('company.create',compact('companys'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'id','company_name', 'contact', 'image'
        //
        $this->validate(request(), [
        'company_name'=>'required',
        'contact'=>'required',
        'image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);
    
        $fileName = null;
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName =md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./public/images/',$fileName);
        }
       $companys=Company::create([
            'company_name' => request()->get('company_name'),
            'contact'=>request()->get('contact'),
            'image'=>$fileName

        ]);
        return redirect('/company/'.$companys->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $companys=Company::find($id);
        return view('company.show', compact('companys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $companys=Company::find($id);
        return view('company.edit', compact('companys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
    //    public function update(Request $request, Product $product)
    // {
        //id','company_name', 'contact', 'image'
     $this->validate(request(), [
        'company_name'=>'required',
        'contact'=>'required',
        'image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);
    
        $fileName = null;
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName =md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./public/images/',$fileName);
        }
       $companys=Company::update([
            'company_name' => request()->get('company_name'),
            'contact'=>request()->get('contact'),
            'image'=>$fileName

        ]);
        return redirect('/company/'.$companys->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $companys=Company::find($id);
        $companys->delete();
        return redirect('/company');
    }
}
