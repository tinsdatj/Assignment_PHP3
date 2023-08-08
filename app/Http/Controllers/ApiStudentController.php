<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
class ApiStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $student =StudentModel::all();
        return StudentResource::collection($student);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = StudentModel::create($request->all());
        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student= StudentModel::find($id);
        if ($student){
            return new StudentResource($student);
        }else{
            return response()->json(['message'=>'Sinh vien d ton tai !'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = StudentModel::find($id);
        if ($student){
            $student->update($request->all());
        }else{
            return response()->json(['message'=>'Sinh vien d ton tai !'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = StudentModel::find($id);
        if ($student){
            $student->delete($id);
            return response()->json(['message'=>'Xoa thanh cong']);
        }else{
            return response()->json(['message'=>'Sinh vien d ton tai']);
        }
    }
}
