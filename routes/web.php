<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProfileController;
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


Route::middleware('auth')->group(function () {
    //User Management All Routes
    Route::prefix('users')->group(function () {
        Route::name('user.view')->get("/view", [UserController::class, 'userView']); //Voir tous les utilisateur
        Route::name('user.add')->get('/add', [UserController::class, 'userAdd']); //Ajouter un utilisateur (vue)
        Route::name('user.store')->post('/store', [UserController::class, 'userStore']); // Creation d'un nouvelle utilisateur
        Route::name('user.edit')->get('/edit/{id}', [UserController::class, 'userEdit']); //Vue de modification des information de l'utilisateur
        Route::name('user.update')->put('/update/{id}', [UserController::class, 'userUpdate']); //Mettre a jour un utilisateur
        Route::name('user.delete')->get('/delete/{id}', [UserController::class, 'userDelete']);
    });

    //Gerer le profile utilisateur
    Route::prefix('profile')->group(function () {
        Route::name('profile.view')->get('/view', [ProfileController::class, 'profileView']); //Afficher le profil utilisateur
        Route::name('profile.edit')->get('/edit', [ProfileController::class, 'profileEdit']); // vue page d'edition du profile
        Route::name('profile.store')->post('/store', [ProfileController::class, 'profileStore']);
    });
});
