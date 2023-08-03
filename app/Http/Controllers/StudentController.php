<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        $title = 'Add Customer';
//
        if($request->isMethod('POST')){
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $request->image = uploadFile('image', $request->file('image'));
            }
            $params = $request->except('_token', 'image');
            $params['image'] = $request->image;

            $addStudent = StudentModel::create($params);

            if($addStudent->id){
                Session::flash('success', 'Thêm khách hàng thành công');
            }

        }



        return view('students.add', compact('title'));
    }

    public  function edit(StudentRequest $request,$id){
        $title = "Chỉnh sửa sinh viên";
        $student = DB::table('students')->where('id', $id)->first();
        if ($request->isMethod('POST')){
            $params = $request->except('_token','image');
            if ($request->hasFile('image')&&$request->file('image')->isValid()){
                $requestDL = Storage::delete('/public/'.$student->image);
                if ($requestDL){
                    $request->image = uploadFile('image',$request->file('image'));
                    $params['image'] = $request->image;
                }
            }else{
                $params['image'] = $student->image;
            }
            $result = StudentModel::where('id',$id)->update($params);
            if ($result){
                Session::flash('success','Sửa Sinh viên thành công');
                return view('students.list');
            }
        }

        return view('students.list');
    }
    public function delete(Request $request,$id){
        $studentDL = StudentModel::where('id',$id)->delete();
        if ($studentDL){
            Session::flash('success','Xóa Sinh viên thành công');
            return redirect()->route('list-student');
        }
    }
}
