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
      <h1 class = title>Add a Car</h1>
      <br>
      <form class= "form" action="add_car" method="post">
         @csrf
         <label class="in_type" for="plateNumber">Plate Number:</label>
         <input class="in_field" type="text" id="plateNumber" name="plateNumber" value = "{{old('plateNumber')}}"><br>
         <span class="error" >@error('plateNumber')*{{$message}} <br> @enderror</span>

         <label class = "in_type" for="color">Color:</label>
         <select class = "dropdown-container" id="color" name="color" value = "{{old('name')}}">
            <option class = "dropdown-select" value="" selected disabled>Select Color</option>
            <option class = "dropdown-select" value="Red">Red</option>
            <option class = "dropdown-select" value="Blue">Blue</option>
            <option class = "dropdown-select" value="Green">Green</option>
            <option class = "dropdown-select" value="Black">Black</option>
            <option class = "dropdown-select" value="White">White</option>
            <span class="error" >@error('color')*{{$message}} <br> @enderror</span>
            
         </select><br><br>

         <label class = "in_type" for="year">Year:</label>
      <input class = "in_field" type="number" id="year" name="year" min="2000" max="2024" placeholder="YYYY" value = "{{old('year')}}" ><br><br>
      <span class="error" >@error('year')*{{$message}}@enderror</span>
      

         <label class="in_type" for="model">Model:</label>
         <input class="in_field" type="text" id="model" name="model" value = "{{old('model')}}" ><br><br>
         <span class="error" >@error('model') {{$message}}@enderror</span>

         <label class="in_type" for="office_id">Office ID:</label>
         <input class="in_field" type="text" id="office_id" name="office_id" value = "{{old('office_id')}}" ><br><br>
            
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