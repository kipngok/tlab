<?php

namespace App\Traits;
use App\Code;

trait Randomgenerate {
 

public function generateRandomString($length = 6){


    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }


    dd($randomString);
    // // return $randomString;
    // return view('code.index',compact('codes','products'));
}

?>