@extends('layouts.layout')

@section('content')

  <div class="row">

    @foreach ($events as $event)
      
      <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">{{$event->name}}</h2>
              <h6>Start at {{$event->start_date}}</h6>
              <p>{{$event->details}}</p>

              <!--сделать правильные ссылки-->
              <p><a href="http://localhost:8888/laratest/public/event/{{$event->alias}}" class="btn btn-primary">More</a></p>
      </div>
            </div>
          </div>
    @endforeach   
  </div>

@endsection