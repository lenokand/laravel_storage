@extends('layout')

@section('title', $storageObject->name)

@section('content')
<h2> {{$storageObject->name}}({{count($quantyty)}} шт)</h2>
<div class="mx-auto mb-5">Контент страницы магазина </div>
<div class="">
    
</div>
<div class="">
{{$storageObject->description}}

</div>
@if(count($quantyty))
<table class="table table-success table-striped">
            <thead>
                <tr>
                <!-- <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">character</th>
                <th scope="col">storage number</th>
                <th scope="col">storage name</th>
                <th scope="col">storage adres</th>
                 -->
                <th scope="col">storage_id</th>
                <th scope="col">product_id</th>
                <th scope="col">quantity</th>
                <th scope="col">created at</th>
                <th scope="col">updated at</th>
                </tr>
            </thead>
            <tbody>
      
        @foreach($quantyty as $product)
      
                <tr>
                    <th scope="row">{{$product ->storage_id}} </th>
                    <td>{{$product ->product_id}} </td> 
                    <td>{{$product ->quanity}} </td> 
                    <td>{{$product ->created_at  }} </td> 
                    <td>{{$product ->updated_at  }} </td> 
                   
                </tr>
              
               
      
        @endforeach
        </tbody>
        </table>

        
       
        

@else
<div> Записи не найдены</div>

@endif


<div class="container my-5">
  <div class=" my-2">
    Добавление количества товара в магазин
  </div>
      <form action="{{ route('addtostorage') }}" method="post" >
      @csrf
      <div class="input-group flex-nowrap pb-3">




      <input type="hidden"  value="{{$storageObject->id}}"  name="storage_id" >
 
     
      <select name="product_id"> 
        <option disabled selected>product_id</option>

        @if(count($products))

        @foreach($products as $product)
        <option value="{{$product ->id}}" selected>{{$product ->name}}</option>
        @endforeach
        @else

        <option disabled>товары отсутствуют</option>
        @endif
      </select>
      <!-- <input type="text" class="form-control" placeholder="storage_id" aria-label="Username" aria-describedby="addon-wrapping" name="storage_id"> -->
      <input type="text" class="form-control" placeholder="quantity"  aria-describedby="addon-wrapping" name="quantity">
     
      <input type="text" class="form-control" value="2017-07-23 00:00:00" placeholder="created at"  aria-describedby="addon-wrapping" name="created_at">
      <input type="text" class="form-control" value="2017-07-23 00:00:00" placeholder="updated at"  aria-describedby="addon-wrapping" name="updated_at">


      </div>
      <button type="submit" class="input-group-text" id="addon-wrapping">Добавить количество товара</button>
      </form>

        @if($errors->any())
        <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach


</div>
@endif
@endsection