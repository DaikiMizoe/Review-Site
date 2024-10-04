@extends('layouts.layout')
@section('content')
    <form action="{{route('reviews.create')}}" method="post">
        @csrf
        <label>タイトル</label>
        <input type="text" name="title">
        <label>内容</label>
        <textarea name="comment"></textarea>
        <label>画像</label>
        <input type="file" name="image">
        <button type="submit">投稿</button>
    </form>
@endsection