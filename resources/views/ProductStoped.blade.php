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
<br> <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6"><a href="/"><h4>Product:{{count(Product::where('user_name',Auth::user()->name)->where('add','1')->get())}}</h4></a>
        </div>
        <div class="col-6"><a href="#"><h4 class="stop">Product stoped:{{count(Product::where('user_name',Auth::user()->name)->where('add','0')->get())}}</h4></a>
        </div>
    </div>
</div>
<div class="container">
<div class="Product">
    <div class="row">
    @foreach(Product::all() as $product)
    @if(Auth::user()->name==$product->user_name)
    @if($product->add==0)
        <div class="col-md-4">

    <div class="card">
        <img src="images/{{$product->path}}" alt="" class="card-img-top">
        <div class="card-body">
            @if($product->add==0)
            <h5 class="alert alert-danger">this product is delivered</h5>
            @endif
            @if($product->add==1)
            <h5 class="alert alert-success">this product is not delivered</h5>
            @endif
            <h2 class="card-title">{{$product->name}}</h2>
            <p class="card-text">{{$product->price}} DHS</p>
            <div class="form">
            {!! Form::open(['action' => 'positionController@start' , 'method' => 'post']) !!}
            {{Form::hidden('product_id',$product->id)}}
            @if($product->add==1)
            {{Form::submit('Start',['class' => 'btn btn-primary one'])}}
            @endif
            @if($product->add==0)
            {{Form::submit('Start',['class' => 'btn btn-primary'])}}
            @endif
            {!! Form::close()!!}
            {!! Form::open(['action' => 'positionController@stop' , 'method' => 'post']) !!}
            {{Form::hidden('user_id',Auth::user()->id)}}
            {{Form::hidden('product_id',$product->id)}}
            @if($product->add==1)
            {{Form::submit('Stop',['class' => 'btn btn-primary '])}}
            @endif
            @if($product->add==0)
            {{Form::submit('Stop',['class' => 'btn btn-primary one','disabled'=> 'disabled'])}}
            @endif
            {!! Form::close()!!}
            </div>
        </div>
    </div>

    </div>
    @endif
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
@if (URL::current()=='http://127.0.0.1:8000/positionStop')

@endif
@endsection
