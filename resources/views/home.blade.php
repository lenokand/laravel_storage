@extends('layout')


@section('title', 'Все магазины')


@section('content')
<form action="{{ route('search')}}" method="get">

        <div class="input-group flex-nowrap pb-5">
       
        <input type="text" class="form-control" placeholder="Поиск по имени по всем товарам" aria-label="Username" aria-describedby="addon-wrapping" name="n">
        <button type="submit" class="input-group-text" id="addon-wrapping">Искать</button>
        </div>
    </form>



@if(count($products))
<h2> Все товары({{count($products)}} шт)</h2>

@if( isset($deleted_id) )
<div class="alert alert-warning">
Вы удалили товар {{$deleted_id}}

</div>

@endif
<table class="table table-success table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">description</th>
                <!-- <th scope="col">storage number</th>
                <th scope="col">storage name</th> -->
                <th scope="col">price</th>
                <!-- <th scope="col">code</th> -->
                <th scope="col">created at</th>
                <th scope="col">updated at</th>
                <th scope="col">удалить</th>
          
                </tr>
            </thead>
            <tbody>
      
        @foreach($products as $product)
          
                <tr>
                    <th scope="row">{{$product ->id}} </th>
                    <td>{{$product ->name}} </td> 
                    <td>{{$product ->description}} </td> 
                    <!-- <td>{{$product ->storage_id }} </td> 
                    <td>{{$product->storage->name}} </td>  -->
                    <td>{{$product ->price  }} </td> 
                    <!-- <td>{{$product ->code  }} </td>  -->
                    <td>{{$product ->created_at  }} </td> 
                    <td>{{$product ->updated_at  }} </td> 
                    <td>
                      <form action="{{ route('del') }}" method="post">@csrf <input name="id" value="{{$product ->id  }}" type="text" hidden> <button type="submit" class="btn btn-warning">delete</button> </form>
                    </td> 
                   
                </tr>
              
               
      
        @endforeach
        </tbody>
        </table>

        
        {{$products->appends(['n' => request()->n])->links()}}
        

@else
<div> Записи не найдены</div>

@endif

<div class="container my-5">
  <div class=" my-2">
    Добавление новой строки в список товаров
  </div>
      <form action="{{ route('add') }}" method="post" >
      @csrf
      <div class="input-group flex-nowrap pb-3">




      <input type="text" class="form-control" value="Товар3" placeholder="name"  aria-describedby="addon-wrapping" name="name">
      <input type="text" class="form-control" value="Прекрасное описание продукта	" placeholder="description"  aria-describedby="addon-wrapping" name="description">
    
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

@endsection