@extends('layouts.layout')

@section('content')

  <div class="row">

    @foreach ($events as $event)
      
      <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h3 class="card-title">{{$event->name}}</h2>
              <h6>{{$event->country->name}} &#8226; {{$event->start_date}} - {{$event->end_date}}</h6>

              <hr>

              <p>{{$event->details}}</p>
              <p><a href="{{URL::action('EventController@show', $event->alias)}}" class="btn btn-primary">More</a></p>

      </div>
            </div>
          </div>
    @endforeach   
  </div>

@endsection