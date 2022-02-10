@extends('layout')

@section('title', 'Все магазины')


@section('content')

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
                <th scope="col">storage number</th>
                <th scope="col">storage name</th>
                <th scope="col">price</th>
                <th scope="col">code</th>
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
                    <td>{{$product ->storage_id }} </td> 
                    <td>{{$product->storage->name}} </td> 
                    <td>{{$product ->price  }} </td> 
                    <td>{{$product ->code  }} </td> 
                    <td>{{$product ->created_at  }} </td> 
                    <td>{{$product ->updated_at  }} </td> 
                    <td><form action="{{ route('del') }}" method="post">@csrf <input name="id" value="{{$product ->id  }}" type="text" hidden> <button type="submit" class="btn btn-warning">delete</button> </form></td> 
                   
                </tr>
              
               
      
        @endforeach
        </tbody>
        </table>

        
        {{$products->appends(['n' => request()->n])->links()}}
        

@else
<div> Записи не найдены</div>

@endif
@endsection