@extends('layouts.app')



@section('content')

<div class="container">

  <div class="row">
    <div class="col-md-12">
      <nav class="navbar navbar-light bg-primary" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="{{URL::action('AdminController@index')}}">All</a>
        <a class="navbar-brand" href="{{URL::action('AdminController@ShowPublished')}}">Published</a>
      </nav>
    </div>
  </div>


@include('errors.list')




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
                            <a href="{{URL::action('AdminController@edit', $event->id)}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{URL::action('AdminController@destroy', $event->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
 