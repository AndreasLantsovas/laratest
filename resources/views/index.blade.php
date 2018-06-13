@extends('layouts.layout')

@section('content')

  <div class="row">

    @foreach ($events as $event)
      
      <div class="col-md-4">
        <h2>{{$event->name}}</h2>
        <h6>Start at {{$event->start_date}}</h6>
        <p>{{$event->details}}</p>

        <!--сделать правильные ссылки-->
        <p><a href="http://localhost:8888/laratest/public/event/{{$event->id}}" class="btn btn-primary">More</a></p>
      </div>
    @endforeach   
  </div>

@endsection