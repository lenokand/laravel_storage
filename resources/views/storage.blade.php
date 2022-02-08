@extends('layout')


@section('content')
<h2> {{$storageObject->name}}</h2>
<div class="mx-auto mb-5">Контент страницы магазина</div>
<div class="">
{{$storageObject->description}}
</div>
@endsection