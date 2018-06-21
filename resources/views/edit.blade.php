@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{ route('update') }}">

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                <div class="form-group">
                    <label for="validationCustom05">Id {{$events->id}}</label>
                        <input type="hidden" name="id" class="form-control" placeholder="Zip" value="{{$events->id}}">
                </div>

                <div class="form-group">
                    <label for="validationCustom05">Event name</label>
                        <input type="text" name="name" class="form-control" placeholder="Zip" rows="1" value="{{$events->name}}">
                </div>

                <div class="form-group">
                    <label for="validationCustom06">Start at</label>
                        <input type="text" name="start_date" class="form-control" rows="1" value="{{$events->start_date}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Details</label>
                    <textarea name="details" class="form-control" rows="6" >{{$events->details}}</textarea>
                </div>



                <div class="form-check">


                   @if ($events->published === 0)
                      <input type="checkbox" class="form-check-input"  name="published" value="0" >
                   @else
                      <input type="checkbox" class="form-check-input"  name="published" value="1" checked>
                   @endif

                   <label class="form-check-label">Publish</label>

                </div>


              <button type="submit" class="btn btn-primary">Save</button>
            </form>

            </div>       
    </div>
</div>

@endsection
 