@extends('template.layout')
@section('content')
    <h3>{{$title}}</h3>
    <a href="{{url('/add/student')}}">Thêm Sinh Viên</a>
    <table class="table table-hover mt-2">
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Hình ảnh</th>
            <th>Thao tác</th>
        </tr>

            @foreach($listStudent as $lst)
                <tr>
                    <th>{{$lst->id}}</th>
                    <th>{{$lst->name}}</th>
                    <th>{{$lst->id == 1 ? "Nam" : "Nữ"}}</th>
                    <th>{{$lst->phone}}</th>
                    <th>{{$lst->address}}</th>
                    <th><img src="{{$lst->image ? Storage::url($lst->image) : ""}}" alt="."></th>
                    <th><a href="{{route('delete-student',['id'=>$lst->id])}}">Xóa</a></th>
                </tr>
            @endforeach

    </table>

@endsection
