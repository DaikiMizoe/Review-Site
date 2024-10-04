<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class DisplayController extends Controller
{
    public function index(){
        $shop = new Shop;
        $all = $shop->get();
        //var_dump($all);
        return view('main',['shops'=>$all]);
    }
}
