@extends('layouts.admin')

@section('stylesheets')
  <link href="{{ asset('css/parsley.css') }}" rel="stylesheet">
@endsection



@section('content')

  @include("errors.list")

<div class="container">
  <div class="row">

<div class="col-12 mt-4">
<a href="">Back</a>
</div>
    <div class="col-md-8 mt-4">

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



    <div class="col-md-4">


    <form  method="post" action="{{route('location_store', ['id' => $event->id])}}">

      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

      <div class="form-group">

        <label>Lacation</label>

      </div>

      <div class="form-group">

        <label>Lat</label>

          <input type="text" class="form-control" placeholder="Lat" name="lat" required>

      </div> 


      <div class="form-group">

        <label>Lng</label>

          <input type="text" class="form-control" placeholder="Lng" name="lng" required>

      </div> 

      <div class="form-group">

        <button type="submit" class="btn btn-success mb-2" >Save</button>

      </div> 

          

    </form>



<!-- @include("errors.list") -->



  



    </div>



</div>    


@endsection
@section('scripts')
  <script src="{{ asset('js/parsley.min.js') }}"></script>
@endsection





 