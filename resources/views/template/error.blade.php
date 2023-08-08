
@if ( Session::has('success') )
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-success">
        {{ Session::get('error') }}
    </div>
@endif
@if ( Session::has('error') )
    <strong>{{ Session::get('error') }}</strong>
@endif
