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
      @include('components.sidebar')
    </div>
    <div>
        <h1>name, {{$auth->name}}</h1>
        <h1>email, {{$auth->email}}</h1>        
    </div>
</body>
</html>
