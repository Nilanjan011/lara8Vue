<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>ABC</title>
    <link rel="stylesheet" href=" {{mix ('css/app.css')}} ">
    <link rel="stylesheet" href="{{asset('css/loading.css')}}">
 </head>
<body>
    <div id="app">
      {{-- <app></app> --}}
        <example-component></example-component>
          
    </div>
      <script src=" {{mix('js/app.js')}} "></script>
      {{-- <script>
          // $(document).ready(function(){C:\xampp\htdocs\laravel8\lara8Vue
          //   alert('bfskjfkujw');
          // });
      </script> --}}
</body>
</html>