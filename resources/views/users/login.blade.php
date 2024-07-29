
@extends('users/app')

@section('main-content')

    <div class="container">
        <h1>Login Form</h1>
        @if(Session::has('error'))
            <span style="color: red;" class="error-message">{{Session::get('error')}}</span>
        @endif
        <form action="{{route('user.login.create')}}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="exampleInputEmail1">Email address*</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{old('email')}}">
                @if($errors->has('email'))
                    <span style="color: red;">{{$errors->first('email')}}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Password*</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                @if($errors->has('password'))
                    <span style="color: red;">{{$errors->first('password')}}</span>
                @endif
            </div>
            
            <button type="submit" class="btn btn-primary" name="login">Submit</button>
        </form>
        <p>Not registered? &nbsp  <a href="{{route('user.register')}}">Register </a></p>
    </div>

@endsection

