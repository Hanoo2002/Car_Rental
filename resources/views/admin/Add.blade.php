<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="{{ asset('css/admin/sidebar.css') }}" rel="stylesheet">
   <link href="{{ asset('css/admin/add.css') }}" rel="stylesheet">
   @vite('resources/css/app.css')

</head>
<body>
   <div>
      @include('components.sidebar')
   </div>
   <div class="container">
      <h1>Add a Car</h1>
      <br>
      <form action="add_car" method="post">
         @csrf
         <label for="plateNumber">Plate Number:</label>
         <input type="text" id="plateNumber" name="plateNumber" value = "{{old('plateNumber')}}"><br>
         <span class="error" >@error('plateNumber')*{{$message}} <br> @enderror</span>

         <label for="color">Color:</label>
         <select id="color" name="color" value = "{{old('name')}}">
            <option value="" selected disabled>Select Color</option>
            <option value="Red">Red</option>
            <option value="Blue">Blue</option>
            <option value="Green">Green</option>
            <option value="Black">Black</option>
            <option value="White">White</option>
            <span class="error" >@error('color')*{{$message}} <br> @enderror</span>
            
         </select><br><br>

         <label for="year">Year:</label>
      <input type="number" id="year" name="year" min="2000" max="2024" placeholder="YYYY" value = "{{old('year')}}" ><br><br>
      <span class="error" >@error('year')*{{$message}}@enderror</span>
      

         <label for="model">Model:</label>
         <input type="text" id="model" name="model" value = "{{old('model')}}" ><br><br>
         <span class="error" >@error('model') {{$message}}@enderror</span>

         <label for="country">Office ID:</label>
         <select id="country" name="country" value = "{{old('country')}}">
            <option value="" selected disabled>Select Office</option>
            <option value="USA">USA</option>
            <option value="Canada">Canada</option>
            <option value="UK">UK</option>
            <option value="Germany">Germany</option>
            <option value="Japan">Japan</option>
         <span class="error" >@error('country')*{{$message}} <br> @enderror</span>
            
         </select><br><br>

         <input type="submit" value="Add Car">
      </form>
   </div>
   
</body>
</html>