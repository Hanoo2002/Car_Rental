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

      <div class="data_item"><p > Name: {{$auth->fname}} {{$auth->lame}}</p> </div>
      <div class="data_item"><p >Email: {{$auth->email}}</p></div>
      <div class="data_item"><p > ID: {{$auth->id}}</p></div>
      <div class="data_item"><p > Office Id: {{$auth->office_id}}</p></div>
      </div>
   </div>
  </body>
</html>