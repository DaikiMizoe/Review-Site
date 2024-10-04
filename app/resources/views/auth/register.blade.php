@extends('layouts.layout')
@section('content')
    <div>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">ユーザー名</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
            </div>
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" />
            </div>
            <div class="form-group">
                <label for="password">パスワード確認</label>
                <input type="password" class="form-control" id="password" name="password" />
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
            </div>
        </form>
    </div>
@endsection