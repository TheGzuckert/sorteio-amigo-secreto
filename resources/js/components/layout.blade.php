<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title class="">{{$title}}</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="d-flex justfy-content-center aling-items-center">{{$title}}</h1>
    {{$slot}}  
  <div>
</body>
</html>