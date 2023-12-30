<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Car</title>
   <link href="{{ asset('css/admin/sidebar.css') }}" rel="stylesheet">
   <link href="{{ asset('css/admin/add.css') }}" rel="stylesheet">
   @vite('resources/css/app.css')

</head>

<body>
   <div>
      @include('components.sidebar')
   </div>
   <div class="container">
      <h1 class=title>Add a Car</h1>
      <br>
      <form class="form" action="add_car" method="post">
         @csrf
         <label class="in_type" for="plateNumber">Plate Number:</label>
         <input class="in_field" type="text" id="plateNumber" name="plateNumber" value="{{old('plateNumber')}}"><br>
         <span class="error">@error('plateNumber')*{{$message}} <br> @enderror</span>

         <label class="in_type" for="office_id">Office ID:</label>
         <select class="dropdown-container" id="office_id" name="office_id" value="{{old('office_id')}}">
            <option class="dropdown-select" value="" selected disabled>Office</option>
            @foreach($offs as $off)
            <option>{{ $off -> office_id}}</option>
            @endforeach
            <span class="error">@error('office_id')*{{$message}} <br> @enderror</span>

         </select><br><br>

         <label class="in_type" for="year">Year:</label>
         <input class="in_field" type="number" id="year" name="year" min="2000" max="2024" placeholder="YYYY"
            value="{{old('year')}}"><br><br>
         <span class="error">@error('year')*{{$message}}@enderror</span>


         <label class="in_type" for="model">Model:</label>
         <input class="in_field" type="text" id="model" name="model" value="{{old('model')}}"><br><br>
         <span class="error">@error('model') {{$message}}@enderror</span>

         <label class="in_type" for="color">Color:</label>
         <input class="in_field" type="text" id="color" name="color" value="{{old('color')}}"><br><br>
         <span class="error">@error('color') {{$message}}@enderror</span>

         <label class="in_type" for="price">Price:</label>
         <input class="in_field" type="text" id="price" name="price" value="{{old('price')}}"><br><br>
         <span class="error">@error('price') {{$message}}@enderror</span>

         <label class="in_type" for="current_status">Status:</label>
         <select class="dropdown-container" id="current_status" name="current_status" value="{{old('current_status')}}">
            <option class="dropdown-select" value="" selected disabled>Status</option>
            <option class="dropdown-select" value="busy">Busy</option>
            <option class="dropdown-select" value="available">Available</option>
            <option class="dropdown-select" value="out_of_service">Out of Service</option>
            <span class="error">@error('current_status')*{{$message}} <br> @enderror</span>

         </select><br><br>


         </select><br><br>

         <input class="btn" type="submit" value="Add Car">

         @if(session('success')) <div class="success-message" style="color: green;">
            {{ session('success') }}
         </div> @elseif(session('fail')) <div class="fail-message" style="color: red;">
            {{ session('fail') }}
         </div> @endif

      </form>
   </div>

</body>

</html>