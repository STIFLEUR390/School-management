<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentYearController;

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
})->name('home');

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
        Route::name('profile.store')->post('/store', [ProfileController::class, 'profileStore']); //Enregistre le profile apres modification
        Route::name('password.view')->get('/password/view', [ProfileController::class, 'passwordView']); // vue de modification du mot de passe
        Route::name('password.update')->post('/password/update', [ProfileController::class, 'passwordUpdate']); // mettre a jour le mot de passe
    });

    // Setup management
    Route::prefix('setups')->group(function () {
        // Student Class Routes
        Route::prefix('student/class')->group(function () {
            Route::name('student.class.view')->get('/view', [StudentClassController::class, 'ViewClassStudent']); // Affiche les diferentes classe
            Route::name('student.class.add')->get('/add', [StudentClassController::class, 'ViewClassAdd']); // vue pour ajouter une classe
            Route::name('student.class.store')->post('/store', [StudentClassController::class, 'studentClassStore']); // Crée une nouvelle classe
            Route::name('student.class.edit')->get('/edit/{id}', [StudentClassController::class, 'studentClassEdit']); // Vue mise a jour nom d'une classe
            Route::name('student.class.update')->put('/update/{id}', [StudentClassController::class, 'studentClassUpdate']); //Mise a jour de la classe d'étudiant
            Route::name('student.class.delete')->get('/delete/{id}', [StudentClassController::class, 'studentClassdelete']); //Supprimer une classe
        });

        //Student year routes
        Route::name('student')->resource('/student/year', StudentYearController::class)->except('show', 'destroy');
        Route::name('student.year.delete')->get('/student/year/delete/{id}', [StudentYearController::class, 'destroy']);

        //Student group route
        Route::name('student')->resource('/student/group', StudentGroupController::class)->except('show', 'destroy');
        Route::name('student.group.delete')->get('/student/group/delete/{id}', [StudentGroupController::class, 'destroy']);

        // Student shift route
        Route::name('student')->resource('/student/shift', StudentShiftController::class)->except('show', 'destroy');
        Route::name('student.shift.delete')->get('/student/shift/delete/{id}', [StudentShiftController::class, 'destroy']);

        //Fee Category route
        Route::name('fee')->resource('/fee/category', FeeCategoryController::class)->except('show', 'destroy');
        Route::name('fee.category.delete')->get('/fee/category/delete/{id}', [FeeCategoryController::class, 'destroy']);

        //Fee category Amount
        Route::name('fee')->resource('/fee/amount', FeeAmountController::class)->except('destroy');

        //Exam type route
        Route::name('exam')->resource('/exam/type', ExamTypeController::class)->except('show', 'destroy');
        Route::name('exam.type.destroy')->get('/exam/type/delete/{id}', [ExamTypeController::class, 'destroy']);

        //School Subjet route
        Route::name('school')->resource('/school/subject', SchoolSubjectController::class)->except('show', 'destroy');
        Route::name('school.subject.destroy')->get('/school/subject/delete/{id}', [SchoolSubjectController::class, 'destroy']);

        // Assign subject route
        Route::name('assign')->resource('/assign/subject', AssignSubjectController::class)->except('destroy');

        //Designation route

        Route::name('designation')->resource('designation', DesignationController::class)->except('show', 'destroy');
        Route::name('designation.designation.destroy')->get('/designation/delete/{id}', [DesignationController::class, 'destroy']);
    });
});
