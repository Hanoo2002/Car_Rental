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
    <script>
        window.onload = function() {
            if (performance.navigation.type === 1) {                
                window.location.href = "/Users";                
            }
        };
    </script>

    
    <div class="container">
        <form id="searchForm" action="search_user" method="GET">
        @csrf
            <input type="text" name="search" placeholder="Search users"  required id="searchbar">
            <button type="submit"><i class="fa fa-search"></i></button>
            <a href='original_page'><button type="button" class="reset-button">Reset</button></a>
            <p>Number of queries: {{ count($users) }}</p>

        </form>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>SSN</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->fname}}</td>
                            <td>{{$user->lname}}</td>
                            <td>{{$user->SSN}}
                            <td>{{$user->phone_number}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script src="{{ asset('js/Users.js') }}"></script>
</body>
</html>
