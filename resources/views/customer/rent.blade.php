<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>rent/pickup</title>
   <link href="{{ asset('css/admin/sidebar.css') }}" rel="stylesheet">
   <link href="{{ asset('css/customer/rent.css') }}" rel="stylesheet">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   @vite('resources/css/app.css')

</head>

<body>
   <div>
      @include('components.customer_sidebar')
   </div>
   <div class="main_container">
      <div class="view_component">
         <form action="search_user" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Search users" required id="searchbar">
            <button type="submit"><i class="fa fa-search"></i></button>
            <a href='original_page'><button type="button" class="reset-button">Reset</button></a>

         </form>
         <div class="row">
            <div class="col-12">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>Model</th>
                        <th>Color</th>
                        <th>year</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($cars as $car)
                     <tr>
                        <td>{{$car['model']}}</td>
                        <td>{{$car['color']}}</td>
                        <td>{{$car['year']}}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="search_component">

      </div>

   </div>



</body>