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

        th,
        td {
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

    <div class="wrapper1">
        <h1>Rent History</h1>

        <div class="view_component">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Car Plate</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Amount</th>
                                <th>City</th>
                                <th>Country</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $res)
                            <tr>
                                <td>{{ $res->plate_number }}</td>
                                <td>{{ $res->model }}</td>
                                <td>{{ $res->year}}</td>
                                <td>{{ $res->start_date}}</td>
                                <td>{{ $res->end_date}}</td>
                                <td>{{ $res->amount_paid}}</td>
                                <td>{{ $res->city}}</td>
                                <td>{{ $res->country}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>



</body>