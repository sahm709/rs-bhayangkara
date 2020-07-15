

@extends('layouts.app')
@section('content')

@foreach ($query as $query)
<div class="card card-body bg-light">
    <?php
        $conn = new mysqli('202.182.52.156', 'root', 'mejikuhibiniu', 'sik');
        $sql = "SELECT COUNT(kd_bangsal) from kamar.statusdata=1 and kd_bangsal={{$query->kd_bangsal}}";
        $result = $conn->query($sql);
        echo $result;
    ?>
<div class="row">
    <div class="col-md-4 col-sm-4">
        <h1>{{$query->nm_bangsal}}</h3>
        <h3>{{$query->kd_kamar}}</h3>
        <h3>{{$query->kd_bangsal}}</h3>
    </div>
</div>

    </div>
@endforeach
@endsection
