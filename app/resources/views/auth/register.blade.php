@extends('layouts.layout')

@section('content')
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div>
            <label>ユーザー名
                <input type="text" name="name">
            </label>
        </div>
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
            <label>パスワード確認
                <input type="password" name="password_confirmation">
            </label>
        </div>
        <div>
            <input type="submit" value="登録">
        </div>
    </form>
@endsection