<!DOCTYPE html>
<html>
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>Customer Profile</title>
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    </head>
<body>
    <h1>Customer Profile</h1>
    <div>
      @include('components.customer_sidebar')
    </div>
    <br> </br>
    <div>
        <div class="data_item"><p > Name: {{$auth->fname}} {{$auth->lname}}</p> </div>
        <div class="data_item"><p >Email: {{$auth->email}}</p></div>
        <div class="data_item"><p > SSN: {{$auth->ssn}}</p></div>
        <div class="data_item"><p > country: {{$auth->country}} </p></div>
        <div class="data_item"><p > city: {{$auth->city}} </p></div>
        <div class="data_item"><p > district: {{$auth->district}} </p></div>
        <div class="data_item"><p > email: {{$auth->email}} </p></div>
        <div class="data_item"><p > phone number: {{$auth->phone_number}} </p></div>
    </div>
</body>
</html>
