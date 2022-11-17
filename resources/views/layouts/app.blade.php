<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Posters - @yield('title')</title>

    </head>

    <body>

        <h1>Posters - @yield('title')</h1>


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

        <div>
            @yield('content')
        </div>

    </body>

</html>