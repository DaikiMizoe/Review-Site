@extends('layouts.layout')

@section('content')
    <h2>店舗登録</h2>
    <form action="{{route('shops.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>店名
                <input type="text" name="name">
            </label>
        </div>
        <div>
            <label>住所
                <input type="text" name="address">
            </label>
        </div>
        <div>
            <label>店舗コメント
                <textarea name="comment"></textarea>
            </label>
        </div>
        <div>
            <label>店舗画像
                <input type="file" name="image" accept=".png,.jpg,.jpeg">
            </label>
        </div>
        <input type="submit" value="登録する">
    </form>
@endsection