<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/Reservations.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Payements</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div>
        @include('components.sidebar')
    </div>
    
    <div class="container">
    <form action="payements_apply" method="POST" class="form_container">
            @csrf
            <div class="date-picker-container">
               <label for="start_date">Start Date</label>
               <input class="search_bar" type="date" name="start_date" id="searchbar">
               <label for="end_date">End Date</label>
               <input class="search_bar" type="date" name="end_date">
               <button class="submit_btn" type="submit">Apply</button>
            </div>
            <p>Number of queries: {{ count($results) }}</p>
            <p>
            <?php
            try {
                echo "Payements Between " . $start_date . " AND " . $end_date;
            } catch (Exception $e) {
            }
            ?>
            </p>
         </form>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <th>Day</th>
                        <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td>{{ $result->payment_day }}</td>
                            <td>{{$result->total_payment}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
