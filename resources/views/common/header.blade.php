<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Quiz Application</title>
  </head>
  <body>
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        @if(Auth('member')->check())
                            <a class="nav-link" href="{{route('user.home')}}">Home <span class="sr-only">(current)</span></a>
                        @else
                            <a class="nav-link" href="{{route('user.non_logged.index')}}">Home <span class="sr-only">(current)</span></a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.register')}}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.add_quiz')}}">Add Quiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.result')}}">Quiz Result</a>
                    </li>
                    
                    @if (auth('member')->check())
                    <li class="nav-item">
                        <h5>{{Auth::guard('member')->user()->name}}</h5>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.log_out')}}">Log out</a>
                    </li>
                    @else
                    
                    @endif
                </ul>
            </div>
        </nav>
    </header>
