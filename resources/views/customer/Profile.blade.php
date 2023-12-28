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
<div class = "container" >
    <h1 class="title"> Admin Data</h1>
    
      @include('components.sidebar')
      <br></br>
      <div>

      <div class="data_item"><p > Name: </p> </div>
      <div class="data_item"><p >Email: </p></div>
      <div class="data_item"><p >  Country</p></div>
      <div class="data_item"><p > City</p></div>
      </div>
   </div>
</body>
</html>
