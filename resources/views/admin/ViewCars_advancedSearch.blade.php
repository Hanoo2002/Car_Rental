<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/Users.css') }}">
    <title>Search Result</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div>
        @include('components.sidebar')
    </div>
    
    <div class="container">
        <div class="nav">
            <a href='back_car'><button type="button" class="reset-button">Back</button></a>
            <p>Number of queries: {{ count($results) }}</p>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Office ID</th>
                            <th>Color</th>
                            <th>Year</th>
                            <th>Model</th>
                            <th>Plate</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td>{{$result->office_id}}</td>
                            <td>{{$result->color}}</td>
                            <td>{{$result->year}}</td>
                            <td>{{$result->model}}</td>
                            <td>{{$result->plate_number}}</td>
                            <td>{{$result->price}}</td>
                            <td>{{$result->current_status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
