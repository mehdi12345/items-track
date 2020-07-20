<?php
use App\Position;
?>
@extends('layouts.app')
@section('head')
<script src="{{ asset('js/map.js') }}" defer></script>
<script type="text/javascript"
src="http://maps.google.com/maps/api/js?sensor=false"></script>

@endsection
@section('content')
<div class="container">
    {!! Form::open(['action' => 'clients@productId', 'method' =>'POST'])!!}
    {{Form::number('product_id','',['placeholder' => 'enter your product id', 'class' => 'form-control'])}} <br>
    {{Form::submit('submit',['class' => 'btn btn-primary'])}}
        {!! Form::close()!!}
    <div style="height: 20px"></div>
        <style>
            #Map{
                width: 100%;
                height: 350px;
            }
        </style>
       <center><button type="button" onclick="getMap({{$latitude}},{{$longitude}});">Show Position on Google Map</button></center>
       <div style="height: 20px"></div>

       <div id="Map">
       </div>
</div>

<div id="lat"></div>
<div id="lon"></div>
<div id="result"></div>
@endsection
