<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link href="{{ asset('css/admin/sidebar.css') }}" rel="stylesheet">
</head>
<body>
   <div>
      @include('components.sidebar')
   </div>
</body>
</html>