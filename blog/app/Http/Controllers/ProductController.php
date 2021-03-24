<?php

namespace App\Http\Controllers;
use App\Company;
use App\Product;
use App\Category;
use App\Code;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $companys= Company::all();
        $categorys=Category::all();
        $totalproducts=Product::all()->count();
        $products = Product::orderBy('created_at','desc')->paginate(6);
        return view('product.index',compact('products','codes','companys','categorys','totalproducts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 public function filtered(Request $category_id)
    {
        //
        if($category_id=='All'){
            $category_id=NULL;
        }
        $categorys=Category::all();
        $products = Product::when($category_id, function ($query, $category_id) {
                    return $query->where('category_id','=', $category_id);
                })->orderBy('created_at','desc')
                ->paginate(20);
        $filters=array();
      
        $filters['category']=$category_id;
        

        return view('product.filtered',compact('products','categorys','filters'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $codes = Code::all();
         $companys= Company::all();
        $categorys=Category::all();
        return view('product.create',compact('codes','companys','categorys'));
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
          $products=Product::create($request->all());
        return redirect('/product/'.$products->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

     public function show($id)
    {
        //
         $categorys=Category::all();
         $companys= Company::all();
        $product=Product::find($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        //
        $categorys=Category::all();
        $companys= Company::all();
        $product=Product::find($id);
        return view('product.edit', compact('product','categorys','companys'));
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
        //
        $categorys=Category::all();
        $product=Product::find($id);
        $input=$request->all();
        $product->update($input);
        // dd($product);
        return redirect('/product/'.$product->id);
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
        $product=Product::find($id);
        $product->delete();
        return redirect('/product');
    }

    
}
