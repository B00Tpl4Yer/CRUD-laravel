<?php 

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginOrRegister']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/register', function () {
    return view('login_register');
})->name('register');

Route::post('/register', [AuthController::class, 'loginOrRegister']);

Route::get('/data', [DataController::class, 'index'])->name('data.index')->defaults('title', 'Data');
Route::post('/data', [DataController::class, 'tambah'])->name('data.tambah');
Route::put('/data/{data}', [DataController::class, 'update'])->name('data.update');
Route::delete('/data/{data}', [DataController::class, 'hapus'])->name('data.hapus');











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
