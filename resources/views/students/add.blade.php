@extends('template.layout')
@section('content')
    <h3>{{$title}}</h3>
    <form action="{{url('/add/student')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Họ tên:</label>

            <input type="text" class="form-control" name="name" >
        </div>
        <div class="mb-3">
            <label class="form-label">Số điện thoại:</label>

            <input type="text" class="form-control" name="phone" >
        </div>
        <div class="mb-3">
            <label class="form-label">Địa chỉ:</label>

            <input type="text" class="form-control" name="address">
        </div>
        <div class="mb-3">
            <label class="form-label">Giới tính : </label>
            <input type="radio" name="gender" name="gender" value="1" >
            <label for="">Nam</label>
            <input type="radio" name="gender" name="gender" value="0">
            <label for="">Nữ</label><br>
        </div>
        <div class="mb-3">
            <label class="mb-3">Ảnh</label>

            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                        <img id="anh_the_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                        <input type="file" name="image" accept="image/*"
                               class="form-control-file @error('image') is-invalid @enderror" id="cmt_anh">

                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Mới</button>
    </form>

@endsection
