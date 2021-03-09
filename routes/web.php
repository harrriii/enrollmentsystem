<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\__UNIVERSAL;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;

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
Auth::routes();

Route::get('/UNIV/FETCHDATA/{data}', [__UNIVERSAL::class, '__FETCHDATA']);

Route::get('/UNIV/SHOW/{data}', [__UNIVERSAL::class, '__SHOW']);

Route::post('/UNIV/INSERT', [__UNIVERSAL::class, '__INSERT']);

Route::get('/UNIV/EDIT', [__UNIVERSAL::class, '__EDIT']);

Route::post('/UNIV/EDIT', [__UNIVERSAL::class, '__EDIT']);

Route::get('/UNIV/DELETE', [__UNIVERSAL::class, '__DELETE']);

Route::post('/UNIV/DELETE', [__UNIVERSAL::class, '__DELETE']); 

Route::get('/', [PageController::class,'home']);

Route::get('/enlistment', [PageController::class,'enlistment']);

Route::get('/application', [PageController::class,'application']);

Route::get('/schedule', [PageController::class,'schedule']);

Route::get('/enrollment', [PageController::class,'enrollment']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/student/profile', [DashboardController::class, 'studentprofile']);

Route::get('/dashboard/class', [DashboardController::class, 'getClass']);

Route::get('/dashboard/registrar/Subjects/{data}', [DashboardController::class, 'getEnlistmentSubjects']);

Route::get('/dashboard/registrar/class/schedule', [DashboardController::class, 'getEnlistmentSubjects']);









// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::resources(
//     [
//         'enlistment' => EnlistmentController::class,
//         'application' => StudentApplicationController::class,
//         'class' => ClassesController::class,
//         'schedule' => ClassesScheduleController::class,
//         'subjects' => SubjectsController::class,
//         'student' => StudentController::class,
//     ]
// );


// Route::post('secretary/offer', [SubjectsController::class, 'toOffer'])->name('subjects.toOffer');

