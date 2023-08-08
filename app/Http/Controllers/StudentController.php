<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\student;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    public function list_students(Request $request){
        $title = "Danh sách Sinh viên";
        $students = new StudentModel();
        $listStudent = $students::all();
        Session::flash('student');

        return view('students.list',compact('title','listStudent'));
    }
    public function  add(StudentRequest $request){
        $title = 'Add student';

        if($request->isMethod('POST')){
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $request->image = uploadFile('image', $request->file('image'));
            }
            $params = $request->except('_token', 'image');
            $params['image'] = $request->image;

            $addStudent = StudentModel::create($params);

            if($addStudent->id){
                Session::flash('success', 'Thêm Sinh vien thành công');

            }

        }



        return view('students.add', compact('title'));
    }

    public  function edit(StudentRequest $request,$id){
        $title = "Chỉnh sửa sinh viên";
        $student = DB::table('students')
            ->where('id', $id)->first();
//            Code update
        if($request->isMethod('POST')){// check xem có post hay không
            $params = $request->except('_token', 'image');
            if($request->hasFile('image') && $request->file('image')->isValid()){
//                Xóa ảnh cũ khi có thực hiện post ảnh mới
                Storage::delete('/public/'.$student->image);

                    $request->image = uploadFile('image', $request->file('image'));
                    $params['image'] =  $request->image;

            }else{
//                nếu không thay hình thì ảnh sẽ là ảnh cũ
                $params['image'] = $student->image;
            }
            $result = StudentModel::where('id', $id)->update($params);
            if($result){
                Session::flash('success', 'Sửa Sinh vien thành công');
//                chuyển trang sau khi thành công
                return redirect()->route('edit-student', ['id'=>$id]);
            }

        }
        return view('students.edit',compact('title','student'));
    }
    public function delete(Request $request,$id){
        $studentDL = StudentModel::where('id',$id)->delete();
        if ($studentDL){
            Session::flash('success','Xóa Sinh viên thành công');
            return redirect()->route('list-student');
        }
    }
}
