@extends('layouts.layout')
@section('content')
    <h1>Main Page</h1>
    <div>
        <div>
            @foreach($shops as $shop)
                <a href="{{route('shops.show',[$shop['id']])}}"><img src="{{asset('storage/images/'.$shop['image'])}}"></a>
        </div>
        <div>
                <p>{{$shop['name']}}</p>
                <p>{{$shop['address']}}</p>
            @endforeach
        </div>
    </div>
@endsection