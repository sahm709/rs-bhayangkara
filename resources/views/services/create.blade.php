@extends('layouts.app')
@section('content')
   <p>Create Services</p>
   {!! Form::open(['action' => 'ServicesController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
   <div class="form-group">
       {{Form::label('name', 'Name')}}
       {{Form::text('name', '',['class'=> 'form-control', 'placeholder'=>'Name'])}}
   </div>
   <div class="form-group">
    {{Form::label('body', 'Body')}}
    {{Form::textarea('body', '',['class'=> 'form-control', 'placeholder'=>'Body Text'])}}
    </div>
    <div class="form-group">
        {{Form::label('praktek', 'Praktek')}}
        {{Form::text('praktek', '',['class'=> 'form-control', 'placeholder'=>'Praktek'])}}
    </div>
    <div class="form-group">
        {{Form::label('hotline', 'Hotline')}}
        {{Form::text('hotline', '',['class'=> 'form-control', 'placeholder'=>'Hotline'])}}
    </div>
    <div class="form-group">
        {{Form::label('jam', 'Jam')}}
        {{Form::text('jam', '',['class'=> 'form-control', 'placeholder'=>'Jam'])}}
    </div>
    <div class="form-group">
        {{Form::label('hari', 'Hari')}}
        {{Form::text('hari', '',['class'=> 'form-control', 'placeholder'=>'Hari'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
        </div>
{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection

