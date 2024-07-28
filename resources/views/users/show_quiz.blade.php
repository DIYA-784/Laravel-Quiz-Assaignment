@extends('users/app')

@section('main-content')

@if(Session::has('error'))
    <span style="color: green;" class="error-message">{{Session::get('error')}}</span>
@endif

<style>
    .disabled {
        opacity: 0.5;
        pointer-events: none; 
        cursor: not-allowed; /
    }
    .active {
        opacity: 1; 
        pointer-events: auto; 
        cursor: default; 
    }
</style>

<?php $counter = 1;
$total = $QuizCount;  ?>
<section class="mt-5">
    <div class="container">
        
        @if($all_quiz->count() > 0)
        <h2>All Quizes</h2>
        <form action="{{route('user.quiz.result.create')}}" method="POST">
            @csrf
            @foreach($all_quiz as $quizzes)
            <?php $dsabl_cls = ($counter == 1 ? 'active' : 'disabled');  ?>
            <div class="container mt-2 quiz-item <?php echo $dsabl_cls; ?>" id="quiz-{{$counter}}">
                <div class="row">
                    <div class="col-sm-8">
                        <input type="hidden" name="answer_id[]" value="{{$quizzes->id}}">
                        <h5><?php echo $counter; ?>. {{$quizzes->question}}</h5>
                        <input type="checkbox"  name="answer[{{$quizzes->id}}][]" value="1">
                        <label for="vehicle1"> {{$quizzes->option_1}}</label><br>
                        <input type="checkbox" name="answer[{{$quizzes->id}}][]" value="2">
                        <label for="vehicle1"> {{$quizzes->option_2}}</label><br>
                        <input type="checkbox" name="answer[{{$quizzes->id}}][]" value="3">
                        <label for="vehicle1"> {{$quizzes->option_3}}</label><br>
                        <input type="checkbox"  name="answer[{{$quizzes->id}}][]" value="4">
                        <label for="vehicle1"> {{$quizzes->option_4}}</label>
                    </div>
                    <div class="col-sm-4" id="choose_time_{{$quizzes->id}}">Time:  {{$quizzes->time}}</div>
                    <?php if($counter < $total){  ?>
                        <button class ="btn btn-primary submit_btn" onclick="nextValidation(event , {{$counter}})">Next</button>
                    <?php } else{  ?>
                        <button class ="btn btn-primary submit_btn" name="submit">Submit</button>
                    <?php }  ?>
                </div>
            </div>
            <?php $counter++; ?>
            @endforeach
        </form>
        @else
            <h5>No quiz yet.</h5>
        @endif

    </div>
</section>
@endsection