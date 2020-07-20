<?php
use App\Position;
?>
@extends('layouts.app')
@section('content')
<div class="container">
    {!! Form::open(['action' => 'clients@productId', 'method' =>'POST'])!!}
    {{Form::number('product_id','',['placeholder' => 'enter your product id', 'class' => 'form-control'])}} <br>
    {{Form::submit('submit',['class' => 'btn btn-primary'])}}
        {!! Form::close()!!}
</div>
@endsection
