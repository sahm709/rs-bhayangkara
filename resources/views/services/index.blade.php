@extends('layouts.app')
@section('content')
    <h1>Services</h1>
    @if (count($services) > 0)
        @foreach ($services as $service)
        <div class="card card-body bg-light">

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <h3><a href="/services/{{$service->id}}">{{$service->name}}</a></h3>
            </div>
        </div>

            </div>
        @endforeach
    @else
        <p>no service found</p>
    @endif
@endsection
