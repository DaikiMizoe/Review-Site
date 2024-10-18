<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ReviewSite') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    @yield('stylesheet')
</head>
<body>
    <div>
        <nav>
            <div>
                <a href="{{url('/')}}">
                    Really Delicious!
                </a>
                <a href="{{url('/admin')}}">
                    管理者はこちら
                </a>
            </div>
            <div>
                @if(Auth::check())
                    <a href="{{route('users.show',Auth::user()->id)}}">マイページ</a>
                    /
                    <a href="#" id="logout">ログアウト</a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;" onclick="return confirm('ログアウトしますか？')">
                        @csrf
                    </form>
                    <script>
                        document.getElementById('logout').addEventListener('click',function(event){
                            event.preventDefault();
                            $result = window.confirm('ログアウトしますか？');
                            if($result == true){
                                document.getElementById('logout-form').submit();
                            }
                        });
                    </script>
                @else
                    <a href="{{route('login')}}">ログイン</a>
                    /
                    <a href="{{route('register')}}">会員登録</a>
                @endif
            </div>
        </nav>
    </div>
    @yield('content')
</body>
</html>