<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login registration page</title>
    <link rel="stylesheet" href="/css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="wrapper">
    <form action="register_user" method="POST" name="form">
        @csrf
        <h1>Login Registration</h1>
        <div class="input-box">
            <label>
                <input type="text" placeholder="First Name" name="f_name" id="f_name" value = "{{old('f_name')}}">
            </label>
            <br>
            <span class="error" >@error('f_name')*{{$message}}@enderror</span>
        </div>
        <div class="input-box">
            <label>
                <input type="text" placeholder="Last Name" name="l_name" id="l_name" value = "{{old('l_name')}}">
            </label>
            <br>
            <span class="error" >@error('l_name')*{{$message}}@enderror</span>
        </div>
        <div class="input-box">
            <label>
                <input type="text" placeholder="Country" name="country" id="country" value = "{{old('country')}}">
            </label>
            <br>
            <span class="error" >@error('country')*{{$message}}@enderror</span>
        </div>
        <div class="input-box">
            <label>
                <input type="text" placeholder="City" name="City" id="City" value = "{{old('City')}}">
            </label>
            <br>
            <span class="error" >@error('City')*{{$message}}@enderror</span>
        </div>
        <div class="input-box">
            <label>
                <input type="text" placeholder="district" name="district" id="district" value = "{{old('district')}}">
            </label>
            <br>
            <span class="error" >@error('district')*{{$message}}@enderror</span>
        </div>
        <div class="input-box">
            <label>
                <input type="text" placeholder="Phone Number" name="p_number" id="p_number" value = "{{old('p_number')}}">
            </label>
            <br>
            <span class="error" >@error('p_number')*{{$message}}@enderror</span>
        </div>
        <div class="input-box">
            <label>
                <input type="text" placeholder="Card Number" name="card" id="card" value = "{{old('card')}}">
            </label>
            <br>
            <span class="error" >@error('card')*{{$message}}@enderror</span>
        </div>

        <div class="pay_method">
            <img class="img" id="visa_pic" src="https://www.pngall.com/wp-content/uploads/2017/05/Visa-Logo-Free-Download-PNG.png">
            <input type="radio" id="visa" name="visa" value="visa">
          <img class="img" id="m_card" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/2560px-MasterCard_Logo.svg.png">
          <input type="radio" id="m_card" name="m_card" value="m_card">
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

        <?php if(isset($_SESSION['error'])): ?>
            <div>
                <?php
                echo $_SESSION["error"];
                unset($_SESSION["error"]);
                ?>
            </div>
        <?php endif; ?>

        <button name="submit" type="submit" class="btn">Register</button>
        <div class="register-link">
            <p>Have an account? <a href="/">login</a> now </p>
        </div>
    </form>
</div>

</body>
</html>