<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/home',['home']);
    

//yes admins no users
Route::middleware('isadmin')->group(function(){

    //create
    Route::get('books/create',[BookController::class,'create']);
    Route::post('books/store',[BookController::class,'store']);
    //update
    Route::get('/books/edit/{id}',[BookController::class,'edit']);
    Route::post('/books/update/{id}',[BookController::class,'update']);
    //delete
    Route::get('/books/delete/{id}',[BookController::class,'delete']);
});



//yes users
Route::middleware('isloggedin')->group(function(){

    //////list
    Route::get('/list',[BookController::class,'list']);
    ///books/show/1
    Route::get('/books/show/{id}',[BookController::class,'show']);

    //this logout
    Route::get('/users/logout/',[UserController::class,'logout']);


});


//registration
Route::get('users/register',[UserController::class,'register']);
Route::post('users/save',[UserController::class,'save']);
//Login
Route::get('users/login',[UserController::class,'login']);
Route::post('users/handleLogin',[UserController::class,'handleLogin']);
//home
Route::get('/home',function(){
    return view('home');
});

//not auth route 
Route::get('/notauth',function(){
return 'you do not have permission to visit this link';
});
?>