<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storage - @yield('title')</title>

            
            <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
            
            <link href="/public/css/app.css" rel="stylesheet">



</head>
<body>

<div class="container py-5">
<a class="text-decoration-none  text-secondary" href="{{ route('home') }}">
  
  
  <h1>
  Тестовое задание
  </h1>
</a>


</div>
<div class="container">
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="{{ route('home') }}">Все товары</a>
  </li>

  @foreach($storagesList as $storage)
  <li class="nav-item">
    <a class="nav-link" href="{{route('storage', $storage->code) }}">{{ $storage->name }}</a>
  </li>
  @endforeach

 
</ul>
</div>
<div class="container ">
  
    @yield('content')
</div>


</div>

    <style>
      svg{
        width:15px;
      }
      nav{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
      }
    </style>
</body>
</html>