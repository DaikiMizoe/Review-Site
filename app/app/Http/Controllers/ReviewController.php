<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Review;
use App\Shop;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('review.review_post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('review.review_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review;
        $shop = Shop::where('id',$request->shop_id);
        $user = Auth::user();

        $review->title = $request->title;
        $review->point = $request->point;
        $review->comment = $request->comment;
        $review->shop_id = $request->shop_id;
        $review->user_id = $user->id;
        if($request->file('image') !== null){
            $path = $request->file('image')->store('public/images');
            $filename = basename($path);
            $review->image = $filename;
        }else{
            $review->image = null;
        }

        $review->save();

        $point = Review::where('shop_id',$request->shop_id)->pluck('point');
        $avg_point = $point->avg();

        //dd($point->avg());

        $shop->update(['point'=>$avg_point]);
        return view('review.review_comp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);
        //dd();
        return view('review.review_edit',['review'=>$review]);
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
        $review = Review::find($id);
        $path = $request->file('image')->store('public/images');
        $image = basename($path);

        $review->title = $request->title;
        $review->point = $request->point;
        $review->comment = $request->comment;
        $review->image = $image;

        $review->save();

        return redirect(route('users.show',Auth::user()->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();

        return redirect(route('users.show',Auth::user()->id));
    }
}
