@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li style="color: red">{{$error}}</li>
        @endforeach
    </ul>
@endif
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
