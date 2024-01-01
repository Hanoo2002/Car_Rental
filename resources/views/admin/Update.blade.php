<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/admin/update.css') }}" rel="stylesheet">
  <title>Update</title>
  @vite('resources/css/app.css')
</head>

<body>
  <div>
    @include('components.sidebar')
  </div>

  <div class="container">
    <h1 class=title>Update Car Status</h1>
    <br>
    <form class="form" action="update_car" method="post">
      @csrf
      <label class="in_type" for="plateNumber">Plate Number:</label>
      <select class="dropdown-container" id="plateNumber_update" name="plateNumber_update"
        value="{{old('plateNumber_update')}}">
        <option class="dropdown-select" value="" selected disabled>Plate Number: </option>
        @foreach($plates as $p)
        <option>{{ $p -> plate_number}}</option>
        @endforeach
        <span class="error">@error('plateNumber_update')*{{$message}} <br> @enderror</span>

      </select><br><br>

      <label class="in_type" for="status">Status:</label>
      <select class="dropdown-container" id="status" name="status" value="{{old('status')}}">
        <option class="dropdown-select" value="" selected disabled>Status</option>
        <option class="dropdown-select" value="out_of_service">Out of service</option>
        <option class="dropdown-select" value="available">Available</option>
        <span class="error">@error('status')*{{$message}} <br> @enderror</span>

      </select><br><br>
      <span class="error"></span>
      <br><br>

      <input class="btn" type="submit" value="Update">
    </form>

    <form class="form" action="delete_car" method="post">
      @csrf
      </select><br><br>
      <label class="in_type" for="plateNumber_delete">Plate Number:</label>

      <select class="dropdown-container" id="plateNumber_delete" name="plateNumber_delete"
        value="{{old('plateNumber_delete')}}">
        <option class="dropdown-select" value="" selected disabled>Plate Number: </option>
        @foreach($plates as $p)
        <option>{{ $p -> plate_number}}</option>
        @endforeach
        <span class="error">@error('plateNumber_delete')*{{$message}} <br> @enderror</span>

      </select><br><br>
      <input class="btn" id="delete" type="submit" value="Delete">
    </form>

    @if(session('success')) <div class="success " style="status: green;">
      {{ session('success') }}
    </div> @elseif(session('fail')) <div class="error" style="status: red;">
      {{ session('fail') }}
    </div> @endif


    </form>
  </div>
</body>

</html>