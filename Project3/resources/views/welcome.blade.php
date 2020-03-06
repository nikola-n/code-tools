<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/62a9ef6f3e.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
          integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a href="#" class="navbar-brand">
        <img src="img/brainster.png" alt="logo">
    </a>
    <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                        <span class="active">
                    <i class="fas fa-american-sign-language-interpreting"></i>
                        Programming</a>
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                        <span>
                            <i class="fas fa-atom"></i>
                        Data Science</a>
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>
                        <i class="fas fa-infinity"></i>
                    devOps</a>
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                      <span>
                        <i class="fas fa-paint-brush"></i>
                      design</a>
                </span>
            </li>
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="#" class="tutorial">
                      <span>
                      <i class="fas fa-plus" style="color:blue;"></i>
                      </span>
                        Submit a tutorial</a>
                    @auth
                        <a href="{{ url('/home') }}" style="color:black;">Home</a>
                    @else
                        <a class="sign" href="{{ route('login') }}" style="color:black;padding: 0;">Sign In /</a>
                        @if (Route::has('register'))
                            <a class="sign" href="{{ route('register') }}" style="color:black;padding: 0;">Sign Up</a>
                        @endif
                    @endauth

                </div>
        @endif
    </div>
</nav>
<div class="container-fluid">
    <h1 class="text-center">Find the Best Programming Courses & Tutorials</h1>
    <div class="text-center">
        <form class="form-inline active-cyan-3 active-cyan-4">
            <i class="fas fa-search fa-2x" aria-hidden="true"></i>
            <input class="form-control form-control-sm ml-3 w-75" type="search"
                   style="width: 70%; border: 0.1px solid #5a6268; border-radius: 4px;box-shadow: 1px 1px 8px gray; padding: 19px 20px; "
                   placeholder="Search for the language you want to learn: PHP, Python, Javascript,.....">
        </form>
    </div>

    <form action="{{route('social.login', 'facebook')}}">
        <button type="submit">Submit facebook</button>
    </form>
    <form action="{{route('social.login', 'github')}}">
        <button type="submit">Submit github</button>
    </form>
    <form action="{{route('social.login', 'google')}}">
        <button type="submit">Submit google</button>
    </form>
    <div class="container">

        <div class="col-md-6">

        </div>

    </div>
</div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    //hovers
    $(".navbar-light .navbar-nav .nav-link").hover(function () {
        $(this).css('color', 'gray');
    }, function () {
        $(this).css('color', 'black');
    });
    $('.tutorial').hover(function () {
        $(this).css('background-color', '#b1d6ff');
        $(this).css('border-radius', '25px');
    }, function () {
        $(this).css('background-color', 'white');
    });

    $('.sign').hover(function () {
        $(this).css('background-color', '#b1d6ff');
        $(this).css('border-radius', '10px');

    }, function () {
        $(this).css('background-color', 'white');
    });
</script>
