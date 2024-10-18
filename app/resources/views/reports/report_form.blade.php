@extends('layouts.layout')

@section('content')
    <h2>違反報告</h2>
    <form action="{{route('reports.store')}}" method="post">
        @csrf
        <div>
            <label>コメント
                <textarea name="comment"></textarea>
            </label>
        </div>
        <input type="hidden" name="id" value="{{request()->query('id')}}"> 
        <input type="submit" value="報告する">
    </form>
@endsection