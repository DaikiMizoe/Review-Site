<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Report;
use App\Review;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        if(Auth::user()->role != 0){
            return redirect('/');
        } else{
            $reports = Report::select('review_id',DB::raw('COUNT(id) AS COUNT'))
                            ->groupBy('review_id')
                            ->get();
            foreach($reports as $report){
                $review_id[] = $report->review_id;
            }
            $reviews = Review::whereIn('id',$review_id)->get();

            $users = Review::select('user_id',DB::raw('COUNT(*) AS count'))
                            ->where('del_flg','=',1)
                            ->groupBy('user_id')
                            ->with('users')->get();
            //dd($users);
            return view('admins.index',['reviews'=>$reviews,'users'=>$users]);
        }
    }

    public function HideReview(Request $request){
        $review = Review::find($request->id);
        $review->del_flg = 1;
        $review->save();
        //dd($review);
        return redirect('/admin');
    }

    public function UserDelete(Request $request){
        $user = User::find($request->id);
        $user->del_flg = 1;
        $user->save();
        return redirect('/admin');
    }
}
