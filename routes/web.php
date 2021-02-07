<?php

use App\Http\Controllers\ElectronicQController;
use App\Http\Controllers\ElectronicQueueController;
use App\Http\Controllers\FormController;
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

// добавление задачи
/*Route::get ("/addTask{id}", [ElectronicQueueController::class, "addTask"])
    ->where('id', '[0-9]+');*/

// принятия задачи в работу
/*Route::get ("/workTask", [ElectronicQueueController::class, "workTask"])
    ->name('/');*/

// оторбражение поступивших задач
Route::get ("/queue", [ElectronicQController::class, "index"]);



Route::get("user{id?}", [UserController::class, "user"]);

Route::match(['get', 'post'],'form', [FormController::class, "form"]);
