@extends('layout')

@section('content')
    <form action="/login" method="post">
        @csrf
        <label for="name"> login </label>
        <input type="text" id="name" name="name" size="15"/>

        <label for="password"> password </label>
        <input type="password" id="password" name="password" size="15"/>

        <input type="submit" value="login">
    </form>
@endsection
