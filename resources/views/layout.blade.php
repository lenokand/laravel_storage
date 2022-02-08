<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link href="/css/app.css" rel="stylesheet">



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
    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Все товары</a>
  </li>

  @foreach($storagesList as $storage)
  <li class="nav-item">
    <a class="nav-link" href="/storages/{{ $storage->code }}">{{ $storage->name }}</a>
  </li>
  @endforeach
<!-- 
  <li class="nav-item">
    <a class="nav-link" href="/storages/postysheva">Магазин #1</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/storages/zemlyanskaya">Магазин #2</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/storages/zaperevalnaya">Магазин #3</a>
  </li> -->
  <li class="nav-item">
    <a class="nav-link" href="/storage/product">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled">Disabled</a>
  </li>
</ul>
</div>
<div class="container ">
  <form action="{{ route('search')}}" method="get">

        <div class="input-group flex-nowrap pb-5">
       
        <input type="text" class="form-control" placeholder="Поиск по имени" aria-label="Username" aria-describedby="addon-wrapping" name="n">
        <button type="submit" class="input-group-text" id="addon-wrapping">Искать</button>
        </div>
    </form>
    @yield('content')
</div>
<div class="container">
<!-- <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav> -->
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