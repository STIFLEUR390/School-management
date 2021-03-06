<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\Account\OtherCostController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\MonthlySalaryController;
use App\Http\Controllers\backend\Marks\GradeController;
use App\Http\Controllers\backend\Marks\MarksController;
use App\Http\Controllers\Backend\Report\AttenReportController;
use App\Http\Controllers\Backend\Report\MarkSheetController;
use App\Http\Controllers\Backend\Report\ProfiteController;
use App\Http\Controllers\Backend\Report\ResultReportController;
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
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\StudentRegistrationController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Livewire\Backend\Report\Profite\ProfiteComponent;

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

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::group(['middleware' => 'prevent-back-history'], function () {

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
                Route::name('student.class.store')->post('/store', [StudentClassController::class, 'studentClassStore']); // Cr??e une nouvelle classe
                Route::name('student.class.edit')->get('/edit/{id}', [StudentClassController::class, 'studentClassEdit']); // Vue mise a jour nom d'une classe
                Route::name('student.class.update')->put('/update/{id}', [StudentClassController::class, 'studentClassUpdate']); //Mise a jour de la classe d'??tudiant
                Route::name('student.class.delete')->get('/delete/{id}', [StudentClassController::class, 'studentClassdelete']); //Supprimer une classe
            });

            //Student year routes
            Route::name('student')->resource('/student/year', StudentYearController::class)->except('show', 'destroy'); // creation, edition et vue des ann??es scolaire
            Route::name('student.year.delete')->get('/student/year/delete/{id}', [StudentYearController::class, 'destroy']);// Suppression d'une ann??e scolaire

            //Student group route
            Route::name('student')->resource('/student/group', StudentGroupController::class)->except('show', 'destroy'); // Ajouter et edition groupe d'??tudiant
            Route::name('student.group.delete')->get('/student/group/delete/{id}', [StudentGroupController::class, 'destroy']); // Supprimer un groupe d'??tudiant

            // Student shift route
            Route::name('student')->resource('/student/shift', StudentShiftController::class)->except('show', 'destroy'); // add, view and edit student shift
            Route::name('student.shift.delete')->get('/student/shift/delete/{id}', [StudentShiftController::class, 'destroy']); // delete student shift

            //Fee Category route
            Route::name('fee')->resource('/fee/category', FeeCategoryController::class)->except('show', 'destroy'); // view, add and edit feecategory
            Route::name('fee.category.delete')->get('/fee/category/delete/{id}', [FeeCategoryController::class, 'destroy']); //delete fee category

            //Fee category Amount
            Route::name('fee')->resource('/fee/amount', FeeAmountController::class)->except('destroy'); // view, add ans edit fee amount

            //Exam type route
            Route::name('exam')->resource('/exam/type', ExamTypeController::class)->except('show', 'destroy'); // view, add and edit exam type
            Route::name('exam.type.destroy')->get('/exam/type/delete/{id}', [ExamTypeController::class, 'destroy']); // delete exam type

            //School Subjet route
            Route::name('school')->resource('/school/subject', SchoolSubjectController::class)->except('show', 'destroy'); // view, add and edit  school subject
            Route::name('school.subject.destroy')->get('/school/subject/delete/{id}', [SchoolSubjectController::class, 'destroy']); // delete school subject

            // Assign subject route
            Route::name('assign')->resource('/assign/subject', AssignSubjectController::class)->except('destroy');  // view, add and edit assign subject

            //Designation route

            Route::name('designation')->resource('designation', DesignationController::class)->except('show', 'destroy'); // view, add and edit designation
            Route::name('designation.designation.destroy')->get('/designation/delete/{id}', [DesignationController::class, 'destroy']); //delete designation
        });

        // Student management

        Route::prefix('students')->group(function () {
            // Student Registration Route
            Route::name('students')->resource('/registration', StudentRegistrationController::class);  // view, add and edit  student registration
            Route::name('students.year.class.wise')->get('/year/class/wise', [StudentRegistrationController::class, 'studentClassYearWise']);
            Route::name('students.registration.promotion')->get('/registration/promotion/{id}', [StudentRegistrationController::class, 'studentRegPromotion']); // student promotion
            Route::name('promotion.student.registration')->post('/registration/promotion/{id}', [StudentRegistrationController::class, 'studentUpdatePromotion']); // update promotion

            // Student Roll Generate Routes
            Route::get('roll/generate/view', [StudentRollController::class, 'index'])->name('roll.generate.index');
            Route::get('reg/get-students', [StudentRollController::class, 'getStudents'])->name('student.registration.get');
            Route::name('roll.generate.store')->post('roll/generate/store', [StudentRollController::class, 'store']);

            // Registration Fee Route
            Route::get('reg/fee/view', \App\Http\Livewire\Backend\Student\RegistrationFeeComponent::class)->name('registration.fee.view');
            Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');

            // Monthly Fee Route
            Route::get('/monthly/fee/view', \App\Http\Livewire\Backend\Student\MonthlyFeeComponent::class)->name('monthly.fee.view');
            Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');

            // Exam fee Route
            Route::get("/exam/fee/view", \App\Http\Livewire\Backend\Student\ExamFeeComponent::class)->name('exam.fee.view');
            Route::get("/exam/fee/payslip", [\App\Http\Controllers\Backend\Student\ExamFeeController::class,'examFeePayslip'])->name('student.exam.fee.payslip');
        });

        Route::prefix('employee')->group(function () {
            Route::name('employee')->resource('/registration', EmployeeRegController::class)->except('destroy', 'show'); // view, add and edit employee registration
            Route::name('employee.registration.detail')->get('/registration/detail/{id}', [EmployeeRegController::class, 'destroy']); // delete employee registration
            Route::name('employee')->resource('/salary', EmployeeSalaryController::class)->except('destroy', 'create', 'store'); // view and edit employee salary
            Route::name('employee')->resource('/leave', EmployeeLeaveController::class)->except('show', 'destroy'); // view, add and edit employee leave
            Route::name('employee.leave.destroy')->get('employee/leave/{id}', [EmployeeLeaveController::class, 'destroy']); // delete employee leave
            Route::name('employee')->resource('/attendance', EmployeeAttendanceController::class)->except('destroy', 'update'); // view, add and edit employee attendance
            Route::name('employee.monthly.salary')->get('monthly/salary', \App\Http\Livewire\Backend\Employee\MonthlySalaryComponent::class);
            Route::name('employee.monthly.salary.payslip')->get('monthly/salary/payslip/{id}', [MonthlySalaryController::class, 'payslip']);
        });

        Route::prefix('marks')->group(function () {
            Route::name('marks')->resource('/entry', MarksController::class)->except('destroy', 'edit', 'show');
            Route::name('student.marks.getstudents')->get('/getstudents', [\App\Http\Controllers\backend\DefaultController::class, 'getStudents']);
            Route::name('marks.getsubject')->get('/getsubject', [\App\Http\Controllers\backend\DefaultController::class, 'getSubject']);
            Route::name('student.edit.getstudents')->get('marks/getstudents/edit', [MarksController::class, 'marksEditGetStudents']);
            Route::name('marks')->resource('/grade', GradeController::class)->except('destroy', 'show');
        });

        Route::prefix('account')->group(function () {
            // Student fee route
            Route::name('student.fee')->get('student/fee', \App\Http\Livewire\Backend\Account\StudentFee\StudentFeeComponent::class);
            Route::name('student.fee.create')->get('student/fee/create', \App\Http\Livewire\Backend\Account\StudentFee\AddStudentFeeComponent::class);
            Route::name('student.fee.store')->post('student/fee/store', \App\Http\Controllers\Backend\Account\StoreStudentFeeController::class);
            // Employee Salary Routes
            Route::name('account.salary')->get('salary', \App\Http\Livewire\Backend\Account\AccountSalary\AccountSalaryComponent::class);
            Route::name('account.salary.create')->get('salary/create', \App\Http\Livewire\Backend\Account\AccountSalary\AddAccountSalaryComponent::class);
            Route::name('account.salary.store')->post('salary/store', \App\Http\Controllers\Backend\Account\StoreAccountSalaryController::class);

            // Other Cost route
            Route::name('other')->resource('cost', OtherCostController::class)->except('show', 'destroy');
        });

        Route::prefix('reports')->group(function () {
            Route::name('monthly.profit.index')->get('monthly/profit', ProfiteComponent::class);
            Route::name('report.profit.pdf')->get('monthly/profit/pdf', ProfiteController::class);

            // MarkSheet Generate Routes
            Route::name('marksheet.generate.index')->get('marksheet/generate', [MarkSheetController::class, 'index']);
            Route::post('marksheet/generate/get', [MarkSheetController::class, 'get'])->name('report.marksheet.get');

            // attendance report Route
            Route::get('attendance', [AttenReportController::class, 'index'])->name('attendance.generate.index');
            Route::post('attendance/get', [AttenReportController::class, 'get'])->name('report.attendance.get');

            // Student Result Report Routes
            Route::get('student/result', [ResultReportController::class, 'resultView'])->name('student.result.index');
            Route::post('student/result/get', [ResultReportController::class, 'resultGet'])->name('report.student.result.get');

            // Student ID Card Routes
            Route::get('student/idcard', [ResultReportController::class, 'idCardIndex'])->name('student.idcard.index');
            Route::post('student/idcard/get', [ResultReportController::class, 'idCardGet'])->name('report.student.idcard.get');
        });
    });
});

