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
        <form action="register_admin" method="POST" name="form">
            @csrf
            <h1>Admin Registration</h1>
            <div class="input-box">
                <label>
                    <input type="text" placeholder="first Name" name="f_name" id="f_name" value="{{old('f_name')}}">
                </label>
                <br>
                <span class="error">@error('f_name')*{{$message}}@enderror</span>
            </div>
            <div class="input-box">
                <label>
                    <input type="text" placeholder="last Name" name="l_name" id="l_name" value="{{old('l_name')}}">
                </label>
                <br>
                <span class="error">@error('l_name')*{{$message}}@enderror</span>
            </div>
            <div class="input-box">
                <select class="dropdown-container" id="officeID" name="officeID" value="{{old('officeID')}}">
                    <option class="dropdown-select" value="" selected disabled>Office ID</option>
                    @foreach($offs as $off)
                    <option>{{ $off -> office_id}}</option>
                    @endforeach
                    <span class="error">@error('office_id')*{{$message}} <br> @enderror</span>
                </select>
                <br>
                <span class="error">@error('officeID')*{{$message}}@enderror</span>
            </div>
            <div class="input-box">
                <label>
                    <input type="text" placeholder="ssn" name="ssn" id="ssn" value="{{old('ssn')}}">
                </label>
                <br>
                <span class="error">@error('ssn')*{{$message}}@enderror</span>
            </div>
            <div class="input-box">
                <label>
                    <input type="text" placeholder="Email" name="email" id="email" value="{{old('email')}}">
                </label>
                <br>
                <span class="error">@error('email')*{{$message}}@enderror</span>
            </div>
            <div class="input-box">
                <label>
                    <input type="password" placeholder="password" name="password" id="password">
                </label>
                <br>
                <span class="error">@error('password')*{{$message}}@enderror</span>
            </div>
            <div class="input-box">
                <label>
                    <input type="password" placeholder="confirm password" name="password_confirmation"
                        id="password_confirmation">
                </label>
                <br>
                <span class="error">@error('password_confirmation')*{{$message}}@enderror</span>
            </div>

            @if(session('success')) <div class="success-message" style="color: green;">
                {{ session('success') }}
            </div> @elseif(session('fail')) <div class="fail-message" style="color: red;">
                {{ session('fail') }}
            </div> @endif


            <button name="submit" type="submit" class="btn">Register</button>
            <div class="register-link">
            </div>
        </form>
    </div>

</body>

</html>