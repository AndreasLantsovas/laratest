@extends('layouts.layout')

@section('content')

<div class="row">
	<div class="blog-post">
            <h2 class="blog-post-title">{{$event->name}}</h2>
        	
        	 <h6>{{$event->country->name}} | {{$event->start_date}} - {{$event->end_date}}</h6>
        	 <hr>
		<p>{{$event->details}}</p>
	</div>
</div>

   


@endsection

