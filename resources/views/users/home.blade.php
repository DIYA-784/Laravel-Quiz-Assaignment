@extends('users/app')

@section('main-content')

@if(Session::has('error'))
    <span style="color: green;" class="error-message">{{Session::get('error')}}</span>
@endif

<section class="mt-5">
    <div class="container">
        
        <div class="container mt-2">
            <div class="row">
                @if($get_quiz ->count() > 0)
                    <a href="{{route('user.show_quiz')}}" class="btn btn-primary">Start Quiz</a>
                @else
                    <h5>No quiz yet. Add quiz now.</h5>
                @endif
            </div>
        </div>
        
    </div>
</section>
@endsection