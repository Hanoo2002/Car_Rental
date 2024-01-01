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
      <form class="form" action="add_office_apply" method="post">
         @csrf
         <label class="in_type" for="country">Country:</label>
         <input required class="in_field" type="text" id="country" name="country" placeholder="Country" value="{{old('country')}}"><br>
         <span class="error">@error('country')*{{$message}} <br> @enderror</span>

         <label class="in_type" for="city">City:</label>
         <input required class="in_field" type="text" id="city" name="city"  placeholder="city"
            value="{{old('city')}}"><br><br>
         <span class="error">@error('city')*{{$message}}@enderror</span>

         <label class="in_type" for="district">District:</label>
         <input required class="in_field" type="text" id="district" name="district" placeholder="District" value="{{old('district')}}"><br>
         <span class="error">@error('district') {{$message}}@enderror</span>


         <input class="btn" type="submit" value="Add">

         @if(session('success')) <div class="success-message" style="color: green;">
            {{ session('success') }}
         </div> @elseif(session('fail')) <div class="fail-message" style="color: red;">
            {{ session('fail') }}
         </div> @endif

      </form>
   </div>

</body>

</html>