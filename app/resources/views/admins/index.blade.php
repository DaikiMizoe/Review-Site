@extends('layouts.layout')

@section('content')
    <h2>管理者ページ</h2>
    <div>
        <div>
            <h3>違反投稿リスト</h3>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>内容</th>
                                <th>点数</th>
                                <th>報告数</th>
                                <th>非表示にする</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reviews as $review)
                            <tr>
                                <th>{{$review['title']}}</th>
                                <th>{{$review['comment']}}</th>
                                <th>{{$review['point']}}点</th>
                                <th>{{$review['report']}}件</th>
                                <th><a href="{{route('hide.review',$review['id'])}}" onclick="return confirm('非表示にしますか？')">Go!</a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        <div>
            <h3>違反ユーザーリスト</h3>
            <div>
                    <table>
                        <thead>
                            <tr>
                                <th>ユーザーid</th>
                                <th>名前</th>
                                <th>メールアドレス</th>
                                <th>非表示投稿数</th>
                                <th>削除する</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $userInfo)
                            <tr>
                                <th>{{$userInfo['user_id']}}</th>
                                <th>{{$userInfo->users->name}}</th>
                                <th>{{$userInfo->users->email}}点</th>
                                <th>{{$userInfo['count']}}件</th>
                                <th><a href="{{route('del.user',$userInfo->users->id)}}" onclick="return confirm('削除しますか？')">Go!</a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection