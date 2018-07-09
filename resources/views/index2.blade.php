@extends('layouts.layout')

@section('content')

<div class="row">

  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Countries
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

      @foreach ($menuCountries as $key=>$value)
        <a class="dropdown-item" href="{{URL::action('EventController@CountryEvents', $value)}}">{{$key}}</a>
      @endforeach
    </div>
  </div>
</div> 




@endsection