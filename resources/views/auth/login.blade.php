<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login registration page</title>
    <link rel="stylesheet" href="/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="wrapper">
        <form action="login_user" method="POST" name="form">
            @csrf
            <h1>Login Registration</h1>
             <div class="input-box">
                 <label>
                     <input type="text" placeholder="Email" name="email" id="email" value = "{{old('email')}}">
                 </label>
                 <br>
                <span class="error" >@error('email')*{{$message}}@enderror</span>
                 <i class='bx bxs-car'></i>
             </div>
            <div class="input-box">
                <label>
                    <input type="password" placeholder="password" name="password" id="password">
                </label>
                <br>
                <span class="error" >@error('password')*{{$message}}@enderror</span>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <input type="radio" id="admin" name="user" value="Admin" required>
            <label for="admin" class="user">Admin</label>
            <input type="radio" id="customer" name="user" value="Customer" required>
            <label for="Customer" class="user">Customer</label>
            <br><br>

            
            <button name="submit" type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="register">Register</a></p>
            </div> @if(session('success')) <div class="success-message" style="color: green;">
          {{ session('success') }}
        </div> @elseif(session('fail')) <div class="fail-message" style="color: red;">
          {{ session('fail') }}
        </div> @endif 
            </div>
        </form>
    </div>

</body>
</html>