@extends('layouts.layout')
@section('content')
    <form action="{{route('reviews.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>タイトル
                <input type="text" name="title">
            </label>
        </div>
        <div>
            <label>点数
                <select name="point">
                    <option></option>
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
                <textarea name="comment"></textarea>
            </label>
        <div>
            <label>画像
                <input type="file" name="image" accept=".png,.jpg,.jpeg">
            </label>
        </div>
        <input type="hidden" name="shop_id" value="{{request()->query('id')}}">
        <button type="submit">投稿</button>
    </form>
@endsection