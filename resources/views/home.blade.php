@extends('layout')


@section('content')
@if(count($users))

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
        @foreach($users as $user)
           
                <tr>
                    <th scope="row">{{$user ->id}} </th>
                    <td>{{$user ->name}} </td> 
                    <td>{{$user ->character}} </td> 
                    <td>{{$user ->storagenumber }} </td> 
                    <td>{{$user ->storagename  }} </td> 
                    <td>{{$user ->storageadres  }} </td> 
                    <td>{{$user ->created_at  }} </td> 
                    <td>{{$user ->updated_at  }} </td> 
                   
                </tr>
               
      
        @endforeach
        </tbody>
        </table>

        {{$users->appends(['n' => request()->n])->links()}}

@else
<div> Записи не найдены</div>
@endif
@endsection