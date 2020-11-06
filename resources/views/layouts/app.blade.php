<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<title>Social app</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">Social App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              
                <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                @else
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a onclick="document.getElementById('logout').submit()" class="dropdown-item" href="#">Logout</a>
                        </div>
                    </li>
                <form id="logout" action="{{route('logout')}}" method="post">
                    @csrf
                </form>
                @endguest    
                </ul>         
              
            </div>
        </div>
    </nav>
    <main class="py-4">
    @yield('content')
    </main>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>