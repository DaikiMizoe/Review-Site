@extends('layouts.layout')
@section('content')
    <div>
        <div>
            <h2>店舗詳細</h2>
            <a href="{{route('reviews.create','id'.'='.$shop->id)}}"><button>レビュー投稿</button></a>
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
                <p>平均点{{$point}}点</p>
            </div>
        </div>
    </div>
    <div>
        <div>
            <h3>レビュー一覧</h3>
        </div>
        <div>
            @foreach($reviews as $review)
                <div>
                    <img src="{{asset('storage/images/'.$review['image'])}}">
                </div>
                <div>
                    <p>{{$review['title']}}</p>
                    <p>{{$review['comment']}}</p>
                </div>
                <div>
                    <a href="{{route('reports.create','id'.'='.$review['id'])}}">報告</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection