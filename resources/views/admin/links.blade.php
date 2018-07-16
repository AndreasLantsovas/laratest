@extends('layouts.admin')

@section('stylesheets')
  <link href="{{ asset('css/parsley.css') }}" rel="stylesheet">
@endsection



@section('content')

@include("errors.list")

<div class="container">
  <div class="row">
    <div class="col-md-8 mt-4">


      <table class="table table-hover mb-4">
                <thead>
                    <tr>

                      <th scope="col">Description</th>

                      <th scope="col">Link</th>
                      <th scope="col"></th>

                    </tr>
                </thead>

                    @foreach ($links as $link)
                    <tr>
                            <th scope="row">{{$link->description}}</th>

                             

                            <td><a href="" >{{$link->link}}</a>

                            </td>

                             
                            <td>
                                <a href="{{route('link_delete', ['event_id' => $event->id, 'id' => $link->id])}}" class="btn btn-outline-danger btn-sm">Delete</a>
                            </td> 
                                       
 

                                        
                    </tr>         
                    @endforeach 



                <tb
                </tbody>
            </table>
    </div>



    <div class="col-md-4  mt-4">


    <form data-parsley-validate method="post" action="{{route('linkstore', ['id' => $event->id])}}">

      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

      <div class="form-group">

        <label>Links</label>

        <select class="form-control" name="link_description" >

          <option  selected>Select type</option>

          <option value="facebook" required>Facebook</option>

          <option value="video" required>Video</option>

          <option value="web page">Web page</option>

        </select>

      </div>

      <div class="form-group">

        <label  class="sr-only">Add new count</label>

          <input type="text" class="form-control" placeholder="Add new link" name="link" required>

      </div>  

          <button type="submit" class="btn btn-success mb-2" >Save</button>

    </form>



<!-- @include("errors.list") -->



  



    </div>



</div>    


@endsection
@section('scripts')
  <script src="{{ asset('js/parsley.min.js') }}"></script>
@endsection





 