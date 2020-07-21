@extends('layouts.app')

@section('content')

<center><h2>Product store</h2></center>
<div style="height: 50px"></div>
@if(session('status')=='done')
<div class="alert alert-success">
    <center>the Product has been added</center>
</div>
@endif
@if(session('status')=='fail')
<div class="alert alert-danger">
    <center>the Product has not been added</center>
</div>
@endif
<div class="container">

{!! Form::open(['action' => 'productController@upload' , 'method' => 'POST','files' => true]) !!}
{{Form::file('file',['id' => 'file','required' ])}}
<div style="height: 25px"></div>
{{ Form::text('name','', ['placeholder' => 'enter the product name', 'class' => 'form-control' ,'id' => 'name', 'required'])}}<br>
{{ Form::text('price','', ['placeholder' => 'enter the product price', 'class' => 'form-control', 'required']) }}<br>
{{ Form::text('user_name','', ['placeholder' => "enter the delivery-man's name", 'class' => 'form-control', 'required']) }}<br>
{{ Form::password('code', ['placeholder' => "enter the require code to add a product", 'class' => 'form-control', 'required']) }}<br>
{{ Form::submit('submit',['class' => 'btn btn-primary']) }}
{!! Form::close()!!}
</div>
@endsection
