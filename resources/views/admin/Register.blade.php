<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin registration page</title>
    <link rel="stylesheet" href="/css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/admin/sidebar.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
<div>
    @include('components.sidebar')
</div>
<div class="wrapper">
    <form action="register_user" method="POST" name="form">
        @csrf
        <h1>Admin Registration</h1>
        <div class="input-box">
            <label>
                <input type="text" placeholder="first Name" name="f_name" id="f_name" value = "{{old('f_name')}}">
            </label>
            <br>
            <span class="error" >@error('f_name')*{{$message}}@enderror</span>
        </div>
        <div class="input-box">
            <label>
                <input type="text" placeholder="last Name" name="l_name" id="l_name" value = "{{old('l_name')}}">
            </label>
            <br>
            <span class="error" >@error('l_name')*{{$message}}@enderror</span>
        </div>
        <div class="input-box">
            <label>
                <input type="text" placeholder="Office ID" name="officeID" id="officeID">
            </label>
            <br>
            <span class="error" >@error('officeID')*{{$message}}@enderror</span>
        </div>
        <div class="input-box">
            <label>
                <input type="text" placeholder="ssn" name="ssn" id="ssn">
            </label>
            <br>
            <span class="error" >@error('ssn')*{{$message}}@enderror</span>
        </div>
        <div class="input-box">
            <label>
                <input type="text" placeholder="Email" name="email" id="email" value = "{{old('email')}}">
            </label>
            <br>
            <span class="error" >@error('email')*{{$message}}@enderror</span>
        </div>
        <div class="input-box">
            <label>
                <input type="password" placeholder="password" name="password" id="password">
            </label>
            <br>
            <span class="error" >@error('password')*{{$message}}@enderror</span>
        </div>
        <div class="input-box">
            <label>
                <input type="password" placeholder="confirm password" name="password_confirmation" id="password_confirmation">
            </label>
            <br>
            <span class="error" >@error('password_confirmation')*{{$message}}@enderror</span>
        </div>

        @if (session()->has('success'))
    <div class="alert alert-success">
        <br>
        {{ session('success') }}
    </div>
    @endif

        <button name="submit" type="submit" class="btn">Register</button>
        <div class="register-link">
        </div>
    </form>
</div>

</body>
</html>