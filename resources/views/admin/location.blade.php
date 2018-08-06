@extends('layouts.admin')

@section('stylesheets')
  <link href="{{ asset('css/parsley.css') }}" rel="stylesheet">
@endsection



@section('content')

  @include("errors.list")

<div class="container">
  <div class="row">

  <div class="col-12 mt-4">
    <a href="{{ route('show', ['event_id' => $event->id])}}"" class="btn btn-outline-warning btn-sm">Back</a>
  </div>

    <div class="col-md-8 mt-4">

      <h3>{{$event->location->formatted_address}}</h3>
      

<!-- Location map -->
        <div class="mt-4" style="width:100%; height: 350px;">

          {!! $map !!}

          @if (empty($map)) 
              none
            @else
              {!! $map !!}     
          @endif
            
        </div>
<!-- Location map end -->

    </div>


<!-- Location form -->
    <div class="col-md-4">


    <form  method="post" action="{{route('location_store', ['id' => $event->id])}}">

      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

      <div class="form-group">

        <label>Lacation</label>

      </div>

      <div class="form-group">

        <label>Address</label>

        <input type="text" class="form-control" placeholder="address" name="address" required>

      </div> 

      <div class="form-group">

        <button type="submit" class="btn btn-success mb-2" >Save</button>

      </div> 
    </form>

<!-- End Location form -->


<!-- @include("errors.list") -->



  



    </div>



</div>    


@endsection
@section('scripts')
  <script src="{{ asset('js/parsley.min.js') }}"></script>
@endsection





 