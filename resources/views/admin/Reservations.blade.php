<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/Reservations.css') }}">
    <title>Reservation</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div>
        @include('components.sidebar')
    </div>

    <script>
        window.onload = function() {            
            if (performance.navigation.type === 1) {  
                window.location.href = "/Reservations";                
            }
        };
    </script>
    
    <div class="container">     
         <form action="Reservations_apply" method="POST" class="form_container">
            @csrf
            <div class="date-picker-container">
               <label for="start_date">Start Date</label>
               <input required class="search_bar" type="date" name="start_date" id="searchbar">
               <label for="end_date">End Date</label>
               <input required class="search_bar" type="date" name="end_date">
               <button class="submit_btn" type="submit">Apply</button>
            </div>
            <p>Number of queries: {{ count($results) }}</p>
            <p>
            <?php
            try {
                echo "Reservation Between " . $start_date . " AND " . $end_date;
            } catch (Exception $e) {
            }
            ?>
            </p>
         </form>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Procedure ID</th>
                        <th>Name</th>
                        <th>SSN</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Plate Number</th>
                        <th>Year</th>
                        <th>Model</th>
                        <th>Color</th>  
                        <th>Price</th>
                        <th>Office ID</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>District</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                     </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                           <td>{{$result->procedure_id}}</td>
                           <td>{{ $result->fname }} {{ $result->lname }}</td>
                            <td>{{$result->SSN}}</td>
                            <td>{{$result->phone_number}}</td>
                            <td>{{$result->email}}</td>
                            <td>{{$result->plate_number}}</td>
                            <td>{{$result->year}}</td>
                            <td>{{$result->model}}</td>
                            <td>{{$result->color}}
                            <td>{{$result->price}}</td>
                            <td>{{$result->office_id}}</td>
                            <td>{{$result->country}}</td>
                            <td>{{$result->city}}</td>
                            <td>{{$result->district}}</td>
                            <td>{{$result->start_date}}</td>
                            <td>{{$result->end_date}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
