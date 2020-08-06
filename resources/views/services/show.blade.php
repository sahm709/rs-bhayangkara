@extends('layouts.app')
@section('content')
    <a href="/services" class="brn btn default">Go back</a>
    <h1>{{$service->name}}</h1>
<br>
<br>
    <div>
        {{$service->body}}
    </div>

    @if (!Auth::guest())
        @if(Auth::user()->id == $service->user_id)
            <a href="/services/{{$service->id}}/edit" class="btn btn-primary">Edit</a>
            {!!Form::open(['action' => ['ServicesController@destroy', $service->id], 'method' => 'POST', 'class' => 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection
