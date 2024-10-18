@extends('layouts.layout')

@section('content')
    <h2>プロフィール編集</h2>
    <form action="{{route('users.update',$user->id)}}" method="post">
        @method('PATCH')
        @csrf
        <div>
            <label>ユーザー名
                <input type="text" name="name" value="{{$user->name}}">
            </label>
        </div>
        <div>
            <label>メールアドレス
                <input type="text" name="email" value="{{$user->email}}">
            </label>
        </div>
        <input type="submit" value="変更する">
    </form>
@endsection