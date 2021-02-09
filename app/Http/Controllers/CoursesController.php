<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Validator;

class CoursesController extends Controller
{

    public function getAllCourses()
    {
        try {
            $courses = Courses::All();
            return response()->json($courses,200);
        } catch (\Throwable $th) {
            return response()->json($th,500);
        }

    }

    public function createCourse(Request $request)
    {
        /* $validate = $request->validate(["nombre"=>"required|string","picture"=>"required|string"]); */
        try {
            $validate = Validator::make($request->all(),["nombre"=>"required|string","picture"=>"required|string"]);
            if($validate->fails()){
                return response()->json($validate->errors(),401);
            }

            $course = Courses::create($request->all());
            return response()->json(["message"=>"Creado correctamente"],201);
        } catch (\Throwable $th) {
            return response()->json($th,500);
        }

    }

    public function updateCourse(Request $request,$id){

try {
    //code...
    $validate = Validator::make($request->all(),["nombre"=>"string","picture"=>"string"]);
    if($validate->fails()){
        return response()->json($validate->errors(),401);
    }

    $response = Courses::where("id",$id)->update($request->all());

    if($response === 1) return response()->json(["message"=>"Actualizado correctamente"],200);
    if($response === 0) return response()->json(["message"=>"No se ha encontrado el curso"],404);

    } catch (\Throwable $th) {
        //throw $th;
        return response()->json( $th,500);
    }

    }

    public function deleteCourse($id){

        try {
            $response = Courses::where("id",$id)->delete();

            if($response === 1)return response()->json(["message"=>"Eliminado correctamente"],200);
            if($response === 0)return response()->json(["message"=>"No se ha encontrado el curso"],404);

        } catch (\Throwable $th) {
            return response()->json($th,500);
        }
    }
}
