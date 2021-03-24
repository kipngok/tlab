<?php

namespace App\Http\Controllers;

use App\Code;
use App\Traits;
use App\Product;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $products= Product::all();
        $codes = Code::orderBy('created_at','desc')->paginate(6);
         return view('code.index',compact('codes','products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
       
    }

  public function generateRandomString(){
    // $arr = array();
    // for ($i=1; $i <=10; $i++){
    //     $arr[] = $i;
    // }
    // shuffle($arr);
    // dd($arr);

// $randomNumbersArray = generateRandomString(6);
 $arr = array();
    for($i = 0; $i <= 5; $i++) {
        $arr[] = mt_rand(); 
    }
    dd($arr);


    // $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    // $charactersLength = strlen($characters);
    // $randomString = 'rr';
    // for ($i = 0; $i < $length; $i++) {
    //     $randomString .= $characters[rand(6, $charactersLength - 1)];
    // }

    // dd($randomString);

    // // return $randomString;
    // return view('code.index',compact('codes','products'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $products = Product::all();
        return view('code.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $length=$request->get('quantity');
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    $arr= array();
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
        $arr[] = $randomString;

    }
     // dd($arr);

$prod=$request->get('product_id');
dd($prod);
for ($i=0; $i <$prod ; $i++) { 
    $code=$arr;
    dd($code);
    # code...
}



//     $json_array = json_encode($arr);
//     dd($json_array);
// $cd=$request->get('code');
//     for($i = 0; $i<= $cd; $i++){


//     }
    // dd($arr);
 // {  $cod=$request->get('code');
 //    $qun = $request->get('quantity');
 //    $arr = array();
 //    for($i = 0; $i <= $qun; $i++) {
 //    $arr[] = mt_rand(); 

 //     }

 //     dd($arr);
 //     $json_array = json_encode($arr);
 //     // dd($json_array);
//      $codes = new Code;
//  //     // $codes->code=$cod;
//      $codes->code=$json_array;
//      dd($codes);
//  //     $codes->save();





// //     $arr = $request['code'];
     // $codes=Code::create($request->all());
     $codes=Code::create($request->all());
        // return redirect('/code/create');

        return redirect('/code/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $codes=Code::find($id);
        return view('code.show', compact('codes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Code  $code
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        //
        $codes=Code::find($id);
        return view('code.edit', compact('codes'));
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
        $codes=Code::find($id);
        $input=$request->all();
        $codes->update($input);
        // dd($product);
        return redirect('/code/'.$codes->id);
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
        $codes=Code::find($id);
        $codes->delete();
        return redirect('/code');
    }
     // 'id', 'product_name','product_desc','volume_size','company_id','category_id'
     //  'id','code', 'product_id'
    
     public function filtered($product_id,$code)
    {
        //
        if($product_id=='All'){
            $product_id=NULL;
        }
        if($code=='All'){
            $code=NULL;
        }
        

        $products=Product::all();
        $codes = Codes::when($product_id, function ($query, $product_id) {
                    return $query->where('product_id','=', $product_id);
                })->when($code, function ($query, $code) {
                    return $query->where('code','=', $code);
                })
               
                ->orderBy('created_at','desc')
                ->paginate(20);
        $filters=array();
        $filters['product']=$product_id;
        $filters['code']=$code;
        

        return view('code.filtered',compact('product','code','filters'));
    }
}
