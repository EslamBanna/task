<?php

use App\Http\Controllers\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


######## first task using bald templates without api authintication
Route::group(['prefix' => 'firstTask'], function () {

    Route::get('/', [Task::class, 'getAllUsers'])->name('index');
    Route::post('/store', [Task::class, 'storeUser']);
});
###################################################################

######## seconde task using api and authinticated in insert data to user_list table

//http://127.0.0.1:8000/api/Secondtask/

Route::group(['prefix' => 'Secondtask'], function () {

    Route::get('/', [Task::class, 'index'])->name('index');
    Route::post('/login', [Task::class, 'login']);

    Route::group(['middleware' => 'checkAuth:user-api'], function () {
        Route::post('/store', [Task::class, 'store']);
        Route::post('/logout', [Task::class, 'logout']);
    });
});
###################################################################
