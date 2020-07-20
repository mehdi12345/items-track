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

        <style>
            #Map{
                width: 100%;
                height: 350px;
            }
        </style>
       <button type="button" onclick="getMap({{$latitude}},{{$longitude}});">Show Position on Google Map</button>
       <div id="Map">
       </div>
</div>

<div id="lat"></div>
<div id="lon"></div>
<div id="result"></div>
@endsection
