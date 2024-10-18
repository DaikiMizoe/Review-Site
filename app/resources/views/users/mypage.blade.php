@extends('layouts.layout')

@section('content')
    <h2>マイページ</h2>
    <div>
        <h3>{{$message}}</h3>
        <div>
            @foreach($reviews as $review)
            <img src="{{asset('storage/images/'.$review['image'])}}">
        </div>
        <div>
            <div>
                @foreach($names as $name)
                <p>{{$name['name']}}</p>
                @endforeach
                <P>{{$review['title']}}</P>
                <p>{{$review['point']}}点</p>
                <p>{{$review['comment']}}</p>
            </div>
            <div>
                <a href="{{route('reviews.edit',$review['id'])}}">編集</a>
                /
                <form action="{{route('reviews.destroy',$review['id'])}}" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" value="削除" onclick="return confirm('削除しますか？')">
                </form>
            </div>
            @endforeach
        </div>
    </div>
    <aside>
        <div>
            <h3>ユーザーメニュー</h3>
            <a href="{{route('users.edit',Auth::user()->id)}}">プロフィール編集</a>
            <a href="{{route('shops.create')}}">店舗登録</a>
            <a href="">退会</a>
        </div>
    </aside>
@endsection