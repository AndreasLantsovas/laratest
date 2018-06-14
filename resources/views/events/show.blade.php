@extends('layouts.layout')

@section('content')

<div class="row">
	<div class="blog-post">
            <h2 class="blog-post-title">{{$event->name}}</h2>
        	<p class="blog-post-meta">Start at {{$event->start_date}}</p>
		<p>{{$event->details}}</p>
	</div>
</div>

   


@endsection

