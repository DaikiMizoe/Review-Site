@extends('layouts.layout')

@section('content')
    <h2>レビュー編集</h2>
    <div>
        <form action="{{route('reviews.update',$review->id)}}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div>
                <label>タイトル
                    <input type="text" name="title" value="{{$review->title}}">
                </label>
            </div>
            <div>
                <label>点数
                    <select name="point">
                        <option value="{{$review->point}}">{{$review->point}}点</option>
                        <option value="1">1点</option>
                        <option value="2">2点</option>
                        <option value="3">3点</option>
                        <option value="4">4点</option>
                        <option value="5">5点</option>
                    </select>
                </label>
            </div>
            <div>
                <label>内容
                    <textarea name="comment">{{$review->comment}}</textarea>
                </label>
            </div>
            <div>
                <label>画像
                    <input type="file" name="image" accept=".png,.jpg,.jpeg" value="{{asset('storage/images/'.$review->image)}}">
                </label>
            </div>
            <button type="submit">編集する</button>
        </form>
    </div>
@endsection