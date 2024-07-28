@extends('users/app')

@section('main-content')

@if(Session::has('error'))
    <span style="color:red;" class="error-message">{{Session::get('error')}}</span>
@endif



@endsection