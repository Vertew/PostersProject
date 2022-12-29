<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Posters @yield('title')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!--<link rel="stylesheet" href="{{asset('/css/app.css')}}"> My original CSS file-->

        @livewireStyles
    </head>


    <body>

        <div class= "container-fluid p-5 bg-primary text-white">
            <h1 class = "text-center display-1">Posters @yield('title')</h1>

            @if(Auth::check())
                <form class = 'mb-1' method="POST" action="{{ route('login.logout') }}">
                    @csrf
                    <input class="btn btn-light" type = "submit" value = "Logout">
                </form>
                <a href="{{route('users.show', ['id'=> Auth::id()])}}">
                    <button class="btn btn-light mr-2" type="button">My Account</button>
                </a>
                @if(request()->route()->uri != 'posts')
                    <a href="{{route('posts.index')}}">
                        <button class="btn btn-light" type="button">Home</button>
                    </a>
                @endif
                <a href="{{url()->previous()}}">
                    <button class="btn btn-light" type="button">Back</button>
                </a>
            @endif
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mt-3 container-md">
                Submit failed due to the following:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><strong>{{$error}}</strong></li>
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