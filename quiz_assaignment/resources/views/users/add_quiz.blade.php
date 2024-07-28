@extends('users/app')

@section('main-content')

    <div class="container">
        <h1>Add Quiz Here</h1>
        @if(Session::has('error'))
            <span style="color: red;" class="error-message">{{Session::get('error')}}</span>
        @endif
        <form action="{{route('user.quiz.create')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Question</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="question" value="{{old('question')}}">
                @if($errors->has('question'))
                    <span style="color: red;" class="error-message">{{$errors->first('question')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Option 1</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="option_1" value="{{old('option_1')}}">
                @if($errors->has('option_1'))
                    <span style="color: red;" class="error-message">{{$errors->first('option_1')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Option 2</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="option_2" value="{{old('option_2')}}">
                @if($errors->has('option_2'))
                    <span style="color: red;" class="error-message">{{$errors->first('option_2')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Option 3</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="option_3" value="{{old('option_3')}}">
                @if($errors->has('option_3'))
                    <span style="color: red;" class="error-message">{{$errors->first('option_3')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Option 4</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="option_4" value="{{old('option_4')}}">
                @if($errors->has('option_4'))
                    <span style="color: red;" class="error-message">{{$errors->first('option_4')}}</span>
                @endif
            </div>
            <div class="mb-4">
                <label for="exampleInputEmail1">Answer</label>
                <br>
                <select name="answer" class="custom-select" id="inputGroupSelect01" value="{{old('answer')}}">
                    <option value="" selected disabled>Select any option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    <option value="4">Option 4</option>
                </select>
                @if($errors->has('answer'))
                    <span style="color: red;" class="error-message">{{$errors->first('answer')}}</span>
                @endif
            </div>
            <div class="mb-4">
                <label for="exampleInputEmail1">Quiz Time</label>
                <br>
                <select name="time" class="custom-select" id="inputGroupSelect01" value="{{old('time')}}">
                    <option value="" selected disabled>Select Time</option>
                    <option value="5">5 minute</option>
                    <option value="4">4 minute</option>
                    <option value="3">3 minute</option>
                    <option value="2">2 minute</option>
                    <option value="1">1 minute</option>
                </select>
                @if($errors->has('time'))
                    <span style="color: red;" class="error-message">{{$errors->first('time')}}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

@endsection