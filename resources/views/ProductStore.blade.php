@extends('layouts.app')
@section('content')

<center><h2>Product store</h2></center>
{!! Form::open()!!}
{{Form::file('file')}}
{{ Form::text('name','', ['placeholder' => 'enter the product name', 'class' => 'form-control']) }}
{{ Form::text('price','', ['placeholder' => 'enter the product price', 'class' => 'form-control']) }}
{{ Form::text('user_name','', ['placeholder' => "enter the delivery-man's name", 'class' => 'form-control']) }}
{!! Form::close()!!}

@endsection
