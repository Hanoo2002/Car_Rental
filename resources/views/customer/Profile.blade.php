<!DOCTYPE html>
<html>
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Login registration page</title>
        <link rel="stylesheet" href="/css/login.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
<body>
    <div class = "wrapper">
        <h1>My Profile</h1>

    <div>
      @include('components.customer_sidebar')
    </div>
    <br> </br>
    <div>
        <div class="data_item"><p > Name: {{$auth->fname}} {{$auth->lname}}</p> </div>
        <div class="data_item"><p >Email: {{$auth->email}}</p></div>
        <div class="data_item"><p > country: {{$auth->country}} </p></div>
        <div class="data_item"><p > city: {{$auth->city}} </p></div>
        <div class="data_item"><p > district: {{$auth->district}} </p></div>
        <div class="data_item"><p > email: {{$auth->email}} </p></div>
        <div class="data_item"><p > phone number: {{$auth->phone_number}} </p></div>
    </div>
    </div>
</body>
</html>
