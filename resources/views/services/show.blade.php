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
        @if(Auth::user()->id == $posts->user_id)
            <a href="/posts/{{$posts->id}}/edit" class="btn btn-default">Edit</a>
            {!!Form::open(['action' => ['PostsController@destroy', $posts->id], 'method' => 'POST', 'class' => 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection
