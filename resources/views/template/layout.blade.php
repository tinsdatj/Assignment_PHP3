
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <title>ASSIGNMENT PHP3</title>
</head>

<body>
<div class="container">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('list-student')}}">ASSIGNMENT PHP3</a>
            <p>DATPTPH25870</p>

        </div>
    </nav>
    {{-- Nội dung --}}
    <div class="container mt-4">
        @include('template.error')
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="mt-3">
        <div class="card text-center">
            <div class="card-header">
                DATPTPH25870
            </div>
            <div class="card-body">
                <h5 class="card-title">ASSIGNMENT PHP3</h5>
                <p class="card-text"><a href="#">Facebook : Đạt Đạt</a></p>
                <a href="#" class="btn btn-primary">ADD FRIEND</a>
            </div>
            <div class="card-footer text-body-secondary">
                DATCHUACONY
            </div>
        </div>
    </footer>
</div>
</body>
<script src="{{asset('bootstrap/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bootstrap/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('bootstrap/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script>
    $(function(){
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cmt_anh").change(function () {
            readURL(this, '#anh_the_preview');
        });
    });
</script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</html>
