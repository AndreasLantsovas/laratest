@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{ route('update') }}">

              @include('_form')
            </form>

            </div>       
    </div>
</div>

@endsection
 