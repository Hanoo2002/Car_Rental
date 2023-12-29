<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/Users.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Users</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div>
        @include('components.sidebar')
    </div>
    
    <div class="container">
        <form action="search_user" method="GET">
        @csrf
            <input type="text" name="search" placeholder="Search users" required>
            <button type="submit"><i class="fa fa-search"></i></button>
            <a href='original_page'><button type="button" class="reset-button">Reset</button></a>

        </form>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>District</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user['fname']}}</td>
                            <td>{{$user['lname']}}</td>
                            <td>{{$user['country']}}</td>
                            <td>{{$user['city']}}</td>
                            <td>{{$user['district']}}</td>
                            <td>{{$user['phone_number']}}</td>
                            <td>{{$user['email']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
