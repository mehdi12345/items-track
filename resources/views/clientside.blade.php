<?php
use App\Position;
?>
@extends('layouts.app')
@section('content')
<div class="container">
    {!! Form::open(['action' => 'clients@productId', 'method' =>'POST'])!!}
    {{Form::number('id','',['placeholder' => 'enter your product id', 'class' => 'form-control'])}} <br>
    {{Form::submit('submit',['class' => 'btn btn-primary'])}}
        {!! Form::close()!!}

@if(Position::where('product_id',$product_id ?? 1)->latest()->first()->show==1)
<h2>{{$latitude ?? 0}}</h2>
<h2>{{$longitude ?? 0}}</h2>
@else
<h1></h1>
@endif
</div>
@endsection
