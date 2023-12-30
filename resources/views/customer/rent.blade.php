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

   <div class ="view">
      <div class="wrapper1">
         <h1>Available Cars</h1>

         <div class="view_component">
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

                  </table>
               </div>
            </div>
         </div>


      </div>
      <div class="wrapper2">
         <h1>search by</h1>
         <form action="search_user" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Search users" required id="searchbar">
            <button type="submit"><i class="fa fa-search"></i></button>
            <a href='original_page'><button type="button" class="reset-button">Reset</button></a>

         </form>

      </div>
   </div>




</body>