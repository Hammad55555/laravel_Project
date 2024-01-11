<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
// routes/web.php

use App\Http\Controllers\TableController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TableController::class, 'showTable']);
Route::post('/table/insert', [TableController::class, 'insertData']);
Route::get('/show',[TableController::class,'demo']);

Route::get('/form', [FormController::class, 'showForm']);
Route::post('/form', [FormController::class, 'savedata'])->name('postdata');
Route::get('/front', [FormController::class, 'showFront']);

