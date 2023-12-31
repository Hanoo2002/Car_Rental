<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/Reservations.css') }}">
    <title>Car Reservation</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div>
        @include('components.sidebar')
    </div>
    
    <div class="container">     
         <form action="carStatus_apply" method="POST" class="form_container">
            @csrf
            <div class="date-picker-container">
               <label for="date">Date</label>
               <input class="search_bar" type="date" name="date" id="searchbar">
               <button class="submit_btn" type="submit">Apply</button>
            </div>
            <p>Number of queries: {{ count($results) }}</p>
            <?php
            try {
                echo "Reservations IN " . $date;
            } catch (Exception $e) {
            }
            ?>
         </form>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Office ID</th>
                        <th>Plate</th>
                        <th>Year</th>
                        <th>Model</th>
                        <th>Price</th>
                        <th>Color</th>
                        <th>Status</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>District</th>
                        <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td>{{$result->office_id}}</td>
                            <td>{{$result->plate_number}}</td>
                            <td>{{$result->year}}</td>
                            <td>{{$result->model}}</td>
                            <td>{{$result->price}}</td>
                            <td>{{$result->color}}</td>
                            <td>{{$result->current_status}}</td>
                            <td>{{$result->country}}</td>
                            <td>{{$result->city}}</td>
                            <td>{{$result->district}}</td>
                            <td>{{$result->date}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>