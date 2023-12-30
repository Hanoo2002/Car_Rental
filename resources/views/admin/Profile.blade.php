<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      @vite('resources/css/app.css')
      <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
      <!-- <link href="{{ asset('css/admin/profile.css') }}" rel="stylesheet"> -->
      <title>Admin Profile</title>
   
  </head>
  <body>
  <div class = "container" >
    <h1 class="title"> Admin Data</h1>
    <div>
      @include('components.sidebar')
    </div>
      <br></br>
      <div>
      <div class="data_item"><p > Name: {{$adminAuth->fname}} {{$adminAuth->lname}}</p> </div>
      <div class="data_item"><p >Email: {{$adminAuth->email}}</p></div>
      <div class="data_item"><p > SSN: {{$adminAuth->SSN}}</p></div>
      <div class="data_item"><p > Office Id: {{$adminAuth->office_id}} </p></div>
      <div class="data_item"><p > Country: {{$adminAuth->country}} </p></div>
      <div class="data_item"><p > City: {{$adminAuth->city}} </p></div>
      </div>
   </div>
  </body>
</html>