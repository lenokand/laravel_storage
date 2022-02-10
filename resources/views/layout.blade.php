<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storage - @yield('title')</title>

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
    <a class="nav-link " aria-current="page" href="{{ route('home') }}">Все товары</a>
  </li>

  @foreach($storagesList as $storage)
  <li class="nav-item">
    <a class="nav-link" href="{{route('storage', $storage->code) }}">{{ $storage->name }}</a>
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
    <a class="nav-link" href="/storage/product">product</a>
  </li>
 
</ul>
</div>
<div class="container ">
  <form action="{{ route('search')}}" method="get">

        <div class="input-group flex-nowrap pb-5">
       
        <input type="text" class="form-control" placeholder="Поиск по имени по всем товарам" aria-label="Username" aria-describedby="addon-wrapping" name="n">
        <button type="submit" class="input-group-text" id="addon-wrapping">Искать</button>
        </div>
    </form>
    @yield('content')
</div>
<div class="container my-5">
<form action="{{ route('add') }}" method="post" >
@csrf
<div class="input-group flex-nowrap pb-3">




<input type="text" class="form-control" value="Товар3" placeholder="name"  aria-describedby="addon-wrapping" name="name">
<input type="text" class="form-control" value="Прекрасное описание продукта	" placeholder="description"  aria-describedby="addon-wrapping" name="description">
<select name="storage_id"> <!--Supplement an id here instead of using 'name'-->
  <option disabled >storage id</option>
  <option value="1" selected>1</option>
  <option value="2" >2</option>
  <option value="3">3</option>
</select>
<!-- <input type="text" class="form-control" placeholder="storage_id" aria-label="Username" aria-describedby="addon-wrapping" name="storage_id"> -->
<input type="text" class="form-control" placeholder="image"  aria-describedby="addon-wrapping" name="image">
<input type="text" class="form-control" placeholder="price" value="1"  aria-describedby="addon-wrapping" name="price">
<input type="text" class="form-control" placeholder="code" value="tovar4"  aria-describedby="addon-wrapping" name="code">
<input type="text" class="form-control" value="2017-07-23 00:00:00" placeholder="created at"  aria-describedby="addon-wrapping" name="created_at">
<input type="text" class="form-control" value="2017-07-23 00:00:00" placeholder="updated at"  aria-describedby="addon-wrapping" name="updated_at">


</div>
<button type="submit" class="input-group-text" id="addon-wrapping">Добавить новый товар</button>
</form>
@if($errors->any())
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach


</div>
@endif
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