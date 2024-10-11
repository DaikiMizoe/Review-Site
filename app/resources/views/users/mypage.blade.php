@extends('layouts.layout')

@section('content')
    <h2>マイページ</h2>
    <div>
        <div>
            @foreach($reviews as $review)
            <img src="{{asset('storage/images/'.$review['image'])}}">
        </div>
        <div>
            @foreach($names as $name)
            <p>{{$name['name']}}</p>
            @endforeach
            <P>{{$review['title']}}</P>
            <p>{{$review['point']}}点</p>
            <p>{{$review['comment']}}</p>
            @endforeach
        </div>
    </div>
@endsection