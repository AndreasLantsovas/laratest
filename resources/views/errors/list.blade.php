
<div class="row">
    <div class="col-md-12">
        @if (\Session::has('success'))
            <div id="successMessage" class="alert alert-success" >
            	<button type="button" class="close" data-dismiss="alert">&times;</button>
            	<p>{{ \Session::get('success') }}</p>
            </div><br/>




        @endif

    </div>
</div>
