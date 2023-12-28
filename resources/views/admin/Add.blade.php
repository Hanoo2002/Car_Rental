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
      <form action="#" method="post">
         <label for="plateNumber">Plate Number:</label>
         <input type="text" id="plateNumber" name="plateNumber" required><br><br>

         <label for="color">Color:</label>
         <select id="color" name="color" required>
            <option value="" selected disabled>Select Color</option>
            <option value="Red">Red</option>
            <option value="Blue">Blue</option>
            <option value="Green">Green</option>
            <option value="Black">Black</option>
            <option value="White">White</option>
            
         </select><br><br>

         <label for="year">Year:</label>
      <input type="number" id="year" name="year" min="1900" max="2099" placeholder="YYYY" required><br><br>

         <label for="model">Model:</label>
         <input type="text" id="model" name="model" required><br><br>

         <label for="country">Office ID:</label>
         <select id="country" name="country" required>
            <option value="" selected disabled>Select Country</option>
            <option value="USA">USA</option>
            <option value="Canada">Canada</option>
            <option value="UK">UK</option>
            <option value="Germany">Germany</option>
            <option value="Japan">Japan</option>
            <!-- Add more country options as needed -->
         </select><br><br>

         <input type="submit" value="Add Car">
      </form>
   </div>
   
</body>
</html>