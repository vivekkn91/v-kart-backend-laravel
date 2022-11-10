<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <!-- CSS only -->

    <!-- Bootstrap CSS -->
    {{-- <link href="{{asset('bootstrap5/bootstrap6/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href={{ asset("bootstrap/css/bootstrap.css") }} rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href={{ asset("bootstrap/css/sticky-footer-navbar.css") }} rel="stylesheet" />

    <!-- Optional theme -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">
    --}}
    <!-- Bootstrap Bundle with Popper -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
{{-- <link href="css/style.css" rel="stylesheet"> --}}

<link href="{{ asset('style.css') }}" rel="stylesheet">


<!-- Scripts -->
{{-- @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- Scripts -->
{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script type="text/javascript">
    var i = 0;
    // console.log($.getJSON('@Url.Action("getajax")'); 
    $("#add").click(function () {

        ++i;

        $("#dynamicTable").append('<tr><td><input type="text" name="invetory[' + i +
            '][item]" class="form-control" /></td><td></td><td><input type="text" name="invetory[' + i +
            '][tax]"  class="form-control" /></td><td><input type="text" name="invetory[' + i +
            '][price]" class="form-control" /></td><td><input type="text" name="invetory[' + i +
            '][selling_price]" class="form-control" /></td><td><input type="text" name="invetory[' + i +
            '][total_price]" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
        );
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });


    $(document).on('click', '.active_btn', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            url: '{{ route("invetory.update") }}',
            method: 'post',
            data: {
                id: id,
                status: 1,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                //   window.location.reload();
            }
        });
        window.location.reload();
    });

    $(document).on('click', '.deactive_btn', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            url: '{{ route("invetory.update") }}',
            method: 'post',
            data: {
                id: id,
                status: 0,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                // window.location.reload();
            }
        });
        window.location.reload();
    });

</script>


{{-- <script>
function duplicate() {    
    var original = document.getElementById('service');
    var rows = original.parentNode.rows;
    var i = rows.length - 1;
    var clone = original.cloneNode(true); // "deep" clone
    clone.id = "duplic" + (i); // there can only be one element with an ID
    original.parentNode.insertBefore(clone, rows[i]);
}</script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
{{-- <script src="{{asset('bootstrap5/bootstrap6/js/bootstrap.bundle.min.js')}}"></script> --}}

</html>
