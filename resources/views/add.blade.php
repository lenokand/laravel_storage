@extends('layout')


@section('content')
<h2>{{$product_name}}</h2>

<div class="mx-auto mb-5">Товар  успешно добавлен</div>
<div class="mx-auto mb-5">

<a class="btn btn-primary" href="{{ route('home') }}">К списку товаров</a>
</div>


@endsection