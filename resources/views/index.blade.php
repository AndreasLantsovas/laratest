@extends('layouts.layout')


@section('jumbotron')
<div class="jumbotron">
    <div class="container">
        <h1>

           @if (! empty($country)) 
                {{$country->name}}
              @else
                {{'Hello world'}}
            @endif



        </h1>
    </div>
</div>
@endsection



@section('content')

  <div class="row">


 

    @foreach ($events as $event)
      
      <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-body">
              <h3 class="card-title">{{$event->name}}</h2>
              <h6>{{$event->country->name}} | {{ date ('j F',  strtotime($event->start_date)) }} - {{ date ('j F',  strtotime($event->end_date)) }}

              <hr>

              <p>{{$event->details}}</p>
              <p><a href="{{URL::action('EventController@show', $event->alias)}}" class="btn btn-primary">More</a></p>

      </div>
            </div>
          </div>
    @endforeach   
  </div>

@endsection

@section('sidebar')
  <div class="card card-body bg-light">
     sidebar
  </div>
@endsection