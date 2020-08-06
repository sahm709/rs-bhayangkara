@extends('layouts.app')
@section('content')
   <p>Edit Post</p>
   {!! Form::open(['action' => ['ServicesController@update',$service->id], 'method'=>'POST']) !!}

<div class="form-group">
    {{Form::label('name', 'Name')}}
    {{Form::text('name', $service->name,['class'=> 'form-control', 'placeholder'=>'Name'])}}
</div>
<div class="form-group">
 {{Form::label('body', 'Body')}}
 {{Form::textarea('body', $service->body,['class'=> 'form-control', 'placeholder'=>'Body Text'])}}
 </div>
 <div class="form-group">
     {{Form::label('praktek', 'Praktek')}}
     {{Form::text('praktek', $service->praktek,['class'=> 'form-control', 'placeholder'=>'Praktek'])}}
 </div>
 <div class="form-group">
     {{Form::label('hotline', 'Hotline')}}
     {{Form::text('hotline', $service->hotline,['class'=> 'form-control', 'placeholder'=>'Hotline'])}}
 </div>
 <div class="form-group">
     {{Form::label('jam', 'Jam')}}
     {{Form::text('jam', $service->jam,['class'=> 'form-control', 'placeholder'=>'Jam'])}}
 </div>
 <div class="form-group">
     {{Form::label('hari', 'Hari')}}
     {{Form::text('hari', $service->hari,['class'=> 'form-control', 'placeholder'=>'Hari'])}}
 </div>
 <div class="form-group">
     {{Form::file('cover_image')}}
     </div>
{{Form::hidden('_method','PUT')}}
{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection

