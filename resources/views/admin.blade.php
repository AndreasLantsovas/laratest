@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($events as $event)
      
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{$event->name}}</h2>
                        <h6>Start at {{$event->start_date}}</h6>
                        <p>{{$event->details}}</p>
                        <p>
                            <a href="{{URL::action('EventController@show', $event->alias)}}" class="btn btn-primary btn-sm">More</a>
                            <a href="{{URL::action('EventController@show', $event->alias)}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{URL::action('AdminController@destroy', $event->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
 