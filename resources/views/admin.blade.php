@extends('layouts.admin')




@section('content')



<div class="container">

            
    <div class="row">
        <div class="col-md-11 mt-4">


            
            <a class="btn btn-secondary"  href="{{URL::action('AdminController@index')}}">All</a>
            <a class="btn btn-secondary"  href="{{URL::action('AdminController@ShowPublished')}}">Published</a>
        </div>
    <div class="col-md-auto mt-4">
        <a class="btn btn-success" href="{{URL::action('AdminController@create')}}">New</a>
    </div>

</div>    




    <div class="row">
        <div class="col-md-12 mt-4">


<table class="table table-hover ">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Country</th>

      <th scope="col">Start</th>
      <th scope="col">End</th>
      <th scope="col">Info</th>
    </tr>
  </thead>
  <tbody>
    




@foreach ($events as $event)
<tr>
        <th scope="row">{{$event->name}}</th>

        <td>
            @if ($event->published === 1)
                    <span class="badge  badge-success">published</span>
                @else
                    <span class="badge  badge-light">unpublished</span>
            @endif
        </td> 

        <td>{{$event->country->name}}</td>            
          
        <td>{{$event->start_date}}</td>
        <td>{{$event->end_date}}</td>                
        <td>
            <a href="{{URL::action('AdminController@Show', $event->id)}}"" class="btn btn-outline-primary btn-sm">More info</a>
        </td>                
                       
<!--                         <p>
                            <a href="{{URL::action('EventController@show', $event->alias)}}" class="btn btn-primary btn-sm">More</a>
                            <a href="{{URL::action('AdminController@edit', $event->id)}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{URL::action('AdminController@destroy', $event->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </p> -->
                    
</tr>         
        @endforeach


 

  </tbody>
</table>


@include("errors.list")



<!--     <div class="row">
        @foreach ($events as $event)
            <div class="col-md-12 mt-4">
                <div class="card">

                    <div class="card-body">
                        <h3 class="card-title">{{$event->name}}</h2>
                        <h5>{{$event->start_date}}</h5>
                        <p>{{$event->details}}</p>
                        <p>
                            <a href="{{URL::action('EventController@show', $event->alias)}}" class="btn btn-primary btn-sm">More</a>
                            <a href="{{URL::action('AdminController@edit', $event->id)}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{URL::action('AdminController@destroy', $event->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach -->
    </div>
</div>    


@endsection


 