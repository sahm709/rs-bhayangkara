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
        {{Form::file('cover_image')}}
        </div>
{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection

