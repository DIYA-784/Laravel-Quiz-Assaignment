@extends('users/app')

@section('main-content')

    <div class="container">
        <h1>Registration Form</h1>
        @if(Session::has('error'))
            <span style="color: red;" class="error-message">{{Session::get('error')}}</span>
        @endif
        <form action="{{route('user.register.create')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name*</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{old('name')}}">
                @if($errors->has('name'))
                    <span style="color: red;">{{$errors->first('name')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address*</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{old('email')}}">
                @if($errors->has('email'))
                    <span style="color: red;">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone*</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="phone" value="{{old('phone')}}">
                @if($errors->has('phone'))
                    <span style="color: red;">{{$errors->first('phone')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password*</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                @if($errors->has('password'))
                    <span style="color: red;">{{$errors->first('password')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password*</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
                @if($errors->has('password_confirmation'))
                    <span style="color: red;">{{$errors->first('password_confirmation')}}</span>
                @endif
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <p>Already registered? &nbsp  <a href="{{route('user.login')}}">Login </a></p>
    </div>

@endsection
