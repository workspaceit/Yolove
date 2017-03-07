<!doctype html>
<html>
    <head>
        @include('user/includes/head')
    </head>
    <body class="logged_in b-user_profile">
        <div class="">
            <header class="">
                @if($response['status']['islogin'])
                @include('user/includes/user_header')
                @else
                @include('user/includes/join_index_header')
                @endif
            </header>

            <div id="main">

                @yield('content')

            </div>

            <footer class="">
                @include('user/includes/footer')
            </footer>

        </div>
    </body>
</html>