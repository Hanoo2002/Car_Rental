<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Reservation</title>
   <link href="{{ asset('css/admin/sidebar.css') }}" rel="stylesheet">
   <link href="{{ asset('css/customer/rent.css') }}" rel="stylesheet">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   @vite('resources/css/app.css')
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
      table {
         font-family: Arial, sans-serif;
         border-collapse: collapse;
         width: 100%;
      }

      th, td {
         border: 1px solid #dddddd;
         text-align: left;
         padding: 8px;
      }

      tr:nth-child(even) {
         background-color: #f2f2f2;
      }

      input[type="radio"] {
         margin: 0;
      }
   </style>

</head>

<body>
<div>
   @include('components.customer_sidebar')
</div>

   <div class ="view">
      <div class="wrapper1">
         <h1>Available Cars</h1>

         <div class="view_component">
            <div class="row">
               <div class="col-12">
                  <table class="table table-bordered">
                     <thead>
                     <tr>
                        <th>Plate Number </th>
                        <th>Year</th>
                        <th>Model</th>
                        <th>Color</th>
                        <th>Office ID</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>District</th>
                        <th>Price</th>
                        <th>Name </th>
                        <th>Phone Number</th>
                        <th>Email</th>
                     </tr>
                     </thead>
                     <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td>{{$result->year}}</td>
                            <td>{{$result->model}}</td>
                            <td>{{$result->color}}
                            <td>{{$result->office_id}}</td>
                            <td>{{$result->country}}</td>
                            <td>{{$result->city}}</td>
                            <td>{{$result->district}}</td>
                            <td>{{$result->price}}</td>
                            <td>{{$result->name}}</td>
                            <td>{{$result->phone_number}}</td>
                            <td>{{$result->email}}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>


      </div>
      <div class="wrapper2">
         <h1>Filter By</h1>
         <form action="/Reservation_apply" method="post" class ="form_container">
            @csrf
            <input class="search_bar" type="date" name="start_date" id="searchbar">
            <br></br>
            <input  class="search_bar"  type="date" name="end_date" >
            
            <br></br>
            <button class="submit_btn" type="submit">Apply<i class="fa fa-search"></i></button>
            

          <!--<a href='original_page'><button type="button" class="reset-button">Reset</button></a>-->

         </form>

      </div>
   </div>



</body>
</html>