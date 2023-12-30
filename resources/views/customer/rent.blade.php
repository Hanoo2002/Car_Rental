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
                        <th>Rent </th>
                        <th>Pickup</th>
                        <th>Model</th>
                        <th>Color</th>
                        <th>year</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($cars as $car)
                        <tr>
                           <td class="btn_wrap"><a class = "btn" href="{{ '/rent/' . $car->car_id }}">Rent</a></td>
                           <td class="btn_wrap"><a class = "btn" href="{{ '/pickup/' . $car->car_id }}">Pickup</a></td>
                           <td>{{ $car->model }}</td>
                           <td>{{ $car->color }}</td>
                           <td>{{ $car->year }}</td>
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
         <form action="rent" method="GET" class ="form_container">
            <input class="search_bar" type="text" name="model" placeholder="Model" id="searchbar">
            <br></br>
            <input  class="search_bar"  type="text" name="year" placeholder="YYYY" id="searchbar">
            <br></br>
            <input  class="search_bar"  type="text" name="color" placeholder="Color" id="searchbar">
            <br></br>
            <button class="submit_btn" type="submit">Apply<i class="fa fa-search"></i></button>
            

          <!--<a href='original_page'><button type="button" class="reset-button">Reset</button></a>-->

         </form>

      </div>
   </div>



</body>