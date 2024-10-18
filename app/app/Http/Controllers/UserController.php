<?php

namespace App\Http\Controllers;

use App\User;
use App\Shop;
use App\Review;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $review = Review::where('user_id',$user['id'])->latest()->get();
        if($review->isNotEmpty()){
            //$result = $review->get();
            $shop = $review->pluck('shop_id');
            $shop_name = Shop::where('id',$shop)->get();
            $message = 'レビュー一覧';
        } else{
            $shop = null;
            $shop_name = null;
            $message = 'まだレビューはありません';
        }
        //dd($result);
        return view('users.mypage',[
            'users'=>$user,
            'reviews'=>$review,
            'names'=>$shop_name,
            'message'=>$message,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.user_edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $columns = ['name','email'];

        foreach($columns as $column){
            $user->$column = $request->$column;
        }

        $user->save();

        return redirect(route('users.show',Auth::user()->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
