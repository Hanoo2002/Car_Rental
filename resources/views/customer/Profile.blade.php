<!DOCTYPE html>
<html>
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>Customer Profile</title>
        <link rel="stylesheet" href="{{ asset('css/customer/profile.css') }}">
    </head>
<body>
    <h1>Customer Profile</h1>
    <div>
      @include('components.customer_sidebar')
    </div>
    <div>
        <h1>name: {{$auth->fname}} {{$auth->lname}}</h1>        
        <h1>email: {{$auth->email}}</h1>        
        <h1>ssn: {{$auth->ssn}}</h1>        
        <h1>country: {{$auth->country}}</h1>        
        <h1>city: {{$auth->city}}</h1>        
        <h1>district: {{$auth->district}}</h1>        
        <h1>phone numbr: {{$auth->phone_number}}</h1>        
        <h1>email: {{$auth->email}}</h1>        
    </div>
</body>
</html>
