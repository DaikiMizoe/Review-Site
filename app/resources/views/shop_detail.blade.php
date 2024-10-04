@extends('layouts.layout')
@section('content')
    <div>
        <h2>店舗詳細</h2>
        <a href="{{route('reviews.index')}}"><button>レビュー投稿</button></a>
    </div>
    <div>
        <div>
            <img src="{{asset('storage/images/'.$shop['image'])}}">
        </div>
        <div>
            <p>{{$shop['name']}}</p>
            <p>{{$shop['address']}}</p>
        </div>
        <div>
            <p>{{$shop['point']}}</p>
        </div>
@endsection