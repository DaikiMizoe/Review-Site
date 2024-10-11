@extends('layouts.layout')

@section('content')
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div>
            <label>メールアドレス
                <input type="text" name="email">
            </label>
        </div>
        <div>
            <label>パスワード
                <input type="password" name="password">
            </label>
        </div>
        <div>
            <input type="submit" value="ログイン">
        </div>
    </form>
@endsection