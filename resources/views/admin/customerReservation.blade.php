<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/Users.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Customer Reservation</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div>
        @include('components.sidebar')
    </div>

    <script>
        window.onload = function() {            
            if (performance.navigation.type === 1) {  
                window.location.href = "/customerReservation";                
            }
        };
    </script>
    
    <div class="container">
        <form action="customerReservation_apply" method="POST">
        @csrf
            <input type="text" name="search" placeholder="Search users" required id="searchbar">
            <button type="submit"><i class="fa fa-search"></i></button>
            <a href='customerReservation'><button type="button" class="reset-button">Reset</button></a>
            <p>Number of queries: {{ count($results) }}</p>
        </form>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>SSN</th>
                        <th>Procedure ID</th>
                        <th>Office ID</th>
                        <th>Plate</th>
                        <th>Year</th>
                        <th>Model</th>
                        <th>Price</th>                        
                        <th>City</th>
                        <th>District</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td>{{ $result->fname }} {{ $result->lname }}</td>
                            <td>{{$result->SSN}}</td>
                            <td>{{$result->procedure_id}}</td>
                            <td>{{$result->office_id}}</td>
                            <td>{{$result->plate_number}}</td>
                            <td>{{$result->year}}</td>
                            <td>{{$result->model}}</td>
                            <td>{{$result->price}}</td>
                            <td>{{$result->city}}</td>
                            <td>{{$result->district}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
