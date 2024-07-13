<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/login', [AuthController::class ,'login'])->name('login');
Route::post('/register', [AuthController::class ,'register'])->name('login');

Route::middleware('auth:api')->group(function () {
    
    Route::prefix('teacher')->middleware('teacher')->group(function (){
        Route::get('/dashboard',[TeacherController::class , 'index']);
        Route::get('/dashboard/create',[TeacherController::class , 'create']);
        Route::post('/dashboard/create',[TeacherController::class , 'store']);
        Route::get('/dashboard/edit',[TeacherController::class , 'edit']);
        Route::put('/dashboard/edit',[TeacherController::class , 'update']);
        Route::delete('/dashboard/edit',[TeacherController::class , 'desrpy']);

    });

    Route::prefix('admin')->middleware('admin')->group(function (){

        
    });

    Route::prefix('student')->middleware('student')->group(function (){

        
    });
});