@extends('layout')

@section('title', $storageObject->name)

@section('content')
<h2> {{$storageObject->name}}({{count($products)}} шт)</h2>
<div class="mx-auto mb-5">Контент страницы магазина </div>
<div class="">
    
</div>
<div class="">
{{$storageObject->description}}

</div>
@if(count($products))
<table class="table table-success table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">character</th>
                <th scope="col">storage number</th>
                <th scope="col">storage name</th>
                <th scope="col">storage adres</th>
                <th scope="col">created at</th>
                <th scope="col">updated at</th>
          
                </tr>
            </thead>
            <tbody>
      
        @foreach($products as $product)
      
                <tr>
                    <th scope="row">{{$product ->id}} </th>
                    <td>{{$product ->name}} </td> 
                    <td>{{$product ->description}} </td> 
                    <td>{{$product ->storage_id }} </td> 
                    <td>{{$product-> storage -> name}} </td> 
                    <td>{{$product ->code  }} </td> 
                    <td>{{$product ->created_at  }} </td> 
                    <td>{{$product ->updated_at  }} </td> 
                   
                </tr>
              
               
      
        @endforeach
        </tbody>
        </table>

        
       
        

@else
<div> Записи не найдены</div>

@endif
@endsection