<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Review;
use App\User;
use illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('shop_detail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shops.shop_register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = new Shop;
        $user = Auth::user();
        $role = User::where('id',$user->id);
        if($request->file('image') !== null){
            $path = $request->file('image')->store('public/images');
            $image = basename($path);
        } else{
            $image = null;
        }

        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->comment = $request->comment;
        $shop->image = $image;
        $shop->user_id = $user->id;

        $shop->save();

        $role->update(['role'=>2]);

        return redirect(route('users.show',Auth::user()->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        $reviews = Review::where('shop_id',$shop['id'])->latest()->get();

        $num = (floor($shop['point'] * 10)/10);
        //dd($num);
        return view('shops.shop_detail',['shop'=>$shop,'reviews'=>$reviews,'point'=>$num]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
