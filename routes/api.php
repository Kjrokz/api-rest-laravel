<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Route::apiResource("courses","CoursesController"); */

Route::get('cursos', [CoursesController::class, 'getAllCourses']);
Route::post("crearCurso",[CoursesController::class,"createCourse"]);
Route::put("updateCurso/{id}",[CoursesController::class,"updateCourse"]);
Route::delete("deleteCurso/{id}",[CoursesController::class,"deleteCourse"]);
