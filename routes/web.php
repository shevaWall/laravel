<?php

use App\Http\Controllers\ElectronicQController;
use App\Http\Controllers\ElectronicQueueController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\NamesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

// отображение списка для выбора задачи
Route::get ("/", [ElectronicQueueController::class, "index"]);
Route::get ("/queue", [ElectronicQueueController::class, "queue"]);
Route::get("/queue/addTask{id}", [ElectronicQueueController::class, "addTask"]);
Route::get("/queue/gowork", [ElectronicQueueController::class, "goWork"]);




Route::get("user{id?}", [UserController::class, "user"]);

Route::match(['get', 'post'],'form', [FormController::class, "form"]);

Route::get ("names", [NamesController::class, "index"]);
Route::get ("names/create", [NamesController::class, 'create']);
Route::get ("names/update{id}", [NamesController::class, 'update']);
Route::get ("names/{id}", [NamesController::class, 'show']);
