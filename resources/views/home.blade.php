<?php
use App\Product;
?>
@extends('layouts.app')
@section('head')
<script src="{{ asset('js/position1.js') }}" defer></script>
@endsection
@section('content')
<div class="container" id="one">
<ul class="userName">
<li><a href="#">{{Auth::user()->name}}</a></li>
</ul>
</div>
<div class="container">
<div class="Product">
    <div class="row">

    @foreach(Product::all() as $product)
    @if(Auth::user()->name==$product->user_name)
        <div class="col-md-4">
    <div class="card">
        <img src="images/{{$product->path}}" alt="" class="card-img-top">
        <div class="card-body">
            <h2 class="card-title">{{$product->name}}</h2>
            <p class="card-text">{{$product->price}} DHS</p>
            <div class="form">
            {!! Form::open(['action' => 'positionController@start' , 'method' => 'post']) !!}
            {{Form::hidden('product_id',$product->id)}}
            {{Form::submit('Start',['class' => 'btn btn-primary'])}}
            {!! Form::close()!!}
            {!! Form::open(['action' => 'positionController@stop' , 'method' => 'post']) !!}
            {{Form::hidden('user_id',Auth::user()->id)}}
            {{Form::hidden('product_id',$product->id)}}
            {{Form::submit('Stop',['class' => 'btn btn-primary'])}}
            {!! Form::close()!!}
            </div>
        </div>
    </div>
    </div>
    @endif
    @endforeach

</div>
            {!! Form::open(['action' => 'positionController@store' , 'method' => 'POST']) !!}
            {{Form::hidden('user_id',Auth::user()->id)}}
            {{Form::hidden('latitude','',['id' =>'latitude'])}}
            {{Form::hidden('longitude','',['id' =>'longitude'])}}
            {{Form::submit('store',['class' => 'btn btn-primary','id' => 'button'])}}
            {!! Form::close()!!}
</div>
</div>
@if (session('status'))
<h1>{{session('status')}}</h1>
@endif
@endsection
