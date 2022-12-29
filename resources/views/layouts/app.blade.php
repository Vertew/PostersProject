<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Posters - @yield('title')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!--<link rel="stylesheet" href="{{asset('/css/app.css')}}"> My original CSS file-->

        @livewireStyles
    </head>


    <body>

        <div class= "container-fluid p-5 bg-primary text-white text-center">

        <h1>Posters @yield('title')</h1>

        @if(Auth::check())
            <form method="POST" action="{{ route('login.logout') }}">
                @csrf
                <input type = "submit" value = "Logout">
            </form>
            <a href="{{route('users.show', ['id'=> Auth::id()])}}">
                <button type="button">My Account</button>
            </a>
            @if(request()->route()->uri != 'posts')
                <a href="{{route('posts.index')}}">
                    <button type="button">Home</button>
                </a>
            @endif
            <a href="{{url()->previous()}}">
                <button type="button">Back</button>
            </a>
        @endif

        </div>

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