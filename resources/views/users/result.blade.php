@extends('users/app')

@section('main-content')

    <div class="container">
        
        @if(Session::has('error'))
            <span style="color: red;" class="error-message">{{Session::get('error')}}</span>
        @endif

        @if($quizzes->count() > 0)
            <div class="container">
                <h1>You got {{$success_num}} out of {{ $QuizCount }}</h1>
                <a href="{{route('user.show_quiz')}}" class="btn btn-primary">Play Quiz Again</a>
            </div>
        @else
            <div class="container">
                <h1>No quizzes yet.</h1>
            </div>
        @endif
        
    </div>

@endsection
