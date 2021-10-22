<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;

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

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('dashboard');
    return view('admin.index');
})->name('dashboard');

//User Management All Routes
Route::prefix('users')->group(function () {
    Route::name('user.view')->get("/view", [UserController::class, 'userView']); //Voir tous les utilisateur
    Route::name('user.add')->get('/add', [UserController::class, 'userAdd']); //Ajouter un utilisateur (vue)
    Route::name('user.store')->post('/store', [UserController::class, 'userStore']);
});
