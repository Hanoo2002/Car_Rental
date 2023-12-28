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
    
      @include('components.sidebar')
      <br></br>
      <div>

      <div class="data_item"><p > Name: "Placeholder Fname" "Lname"</p> </div>
      <div class="data_item"><p > Email: "Placeholder"</p></div>
      <div class="data_item"><p > ID: ""</p></div>
      <div class="data_item"><p > Office Id: </p></div>
      <div class="data_item"><p> Office Data</p></div>
      </div>
   </div>
  </body>
</html>