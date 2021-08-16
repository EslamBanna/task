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

Route::group (['prefix' => 'task'],function(){

    Route::get('/',[Task::class, 'index'])->name('index');
    Route::post('/login',[Task::class,'login']);

    Route::group(['middleware' => 'checkAuth:user-api'],function(){
        Route::post('/store',[Task::class, 'store']);
        Route::post('/logout',[Task::class, 'logout']);

    });

});
