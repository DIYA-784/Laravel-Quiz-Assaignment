@extends('users/app')

@section('main-content')

@if(Session::has('error'))
    <span style="color:red;" class="error-message">{{Session::get('error')}}</span>
@endif

<?php $counter = 1;?>
<section class="mt-5">
    <div class="container">
        @if($all_quiz->count() > 0)
            <h1>Start Your Quiz</h1>
            @foreach($all_quiz as $quizzes)
            <div class="container mt-2">
                <div class="row">
                    @if(Auth('member')->check())
                        <h5><a href="{{route('user.home')}}"><?php echo $counter; ?>. {{$quizzes->question}}</a></h5>
                    @else
                        <h5><a href="{{route('user.login')}}"><?php echo $counter; ?>. {{$quizzes->question}}</a></h5>
                    @endif
                </div>
            </div>
            <?php $counter++; ?>
            @endforeach
        @else
            <h5>No quiz yet.</h5>
        @endif
    </div>
</section>

@endsection