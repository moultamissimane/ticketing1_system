<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

// Route::resource('products', ProductController::class);

// public routes

Route::post('/account/register', [UserController::class, 'store']);
Route::post('/account/login', [UserController::class, 'index']);


// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show']);
// Route::get('/products/search/{name}', [ProductController::class, 'search']);
// Route::post('/login', [AuthController::class, 'login']);


// protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {   
    Route::get('/account/user', [UserController::class, 'show']);
    Route::delete('/account/logout', [UserController::class, 'delete']);
    
    Route::get('/user/questions', [UserController::class, 'questions']);
    Route::delete('/questions/{id}', [QuestionsController::class, 'delete']);
    Route::get('/questions', [QuestionsController::class, 'show']);
    Route::get('/questions/{id}', [QuestionsController::class, 'find']);
    
    Route::get('/response/add', [ResponseController::class, 'store']);
    
    Route::get('/admin/questions', [AdminController::class, 'index']);
    Route::post('/admin/questions/delete', [AdminController::class, '_delete']);
    Route::get('/admin/users', [AdminController::class, 'show']);
    Route::post('/admin/users/activate', [AdminController::class, 'activate']);

    
});
