<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Posters - @yield('title')</title>

        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @livewireStyles
    </head>


    <body>

        <h1>Posters @yield('title')</h1>

        <form method="POST" action="{{ route('login.logout') }}">
            @csrf
            <input type = "submit" value = "Logout">
        </form>

        <a href="{{route('posts.index')}}">
            <button type="button">Home</button>
        </a>

        @if ($errors->any())
            <div>
                Submit failed due to the following:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message'))
            <p><b>{{session('message')}}</b></p>
        @endif

        @yield('content')

        @livewireScripts

    </body>

</html>