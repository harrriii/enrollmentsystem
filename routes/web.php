<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\__UNIVERSAL;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\LazyDevs\LazyServices;

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

// finalized..
Route::post('/UNIV/INSERT', [__UNIVERSAL::class, '__INSERTN']);

Route::post('/UNIV/EDIT', [__UNIVERSAL::class, '__EDITN']);

Route::post('/UNIV/DELETE', [__UNIVERSAL::class, '__DELETEN']); 

Route::post('/APPLICATION/VERIFY', [__UNIVERSAL::class, 'verifyApplication']); 

Route::post('/APPLICATION/SUBMIT', [__UNIVERSAL::class, 'submitApplication']); 

Route::get('/APPLICATION/GETCODE', [__UNIVERSAL::class, 'generateVerificationCode']); 

Route::get('/APPLICATION/GETID', [__UNIVERSAL::class, 'getLatestApplicantId']); 





Route::get('/UNIV/FETCHJS/{data}', [__UNIVERSAL::class, '__FETCH']);

Route::get('/UNIV/FETCHDATA/{data}', [__UNIVERSAL::class, '__FETCHDATA']);

Route::get('/UNIV/SHOW/{data}', [__UNIVERSAL::class, '__SHOW']);



Route::get('/', [PageController::class,'home']);

Route::get('/enlistment', [PageController::class,'enlistment']);

Route::get('/application', [PageController::class,'application']);

Route::get('/application/verification', [PageController::class,'email_verification']);

Route::get('/schedule', [PageController::class,'schedule']);

Route::get('/enrollment', [PageController::class,'enrollment']);

// Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/appointment', [DashboardController::class, 'appointments']);

Route::get('/dashboard/visitor', [DashboardController::class, 'visitors']);

Route::get('/dashboard/resident', [DashboardController::class, 'residents']);

Route::get('/dashboard/contact', [DashboardController::class, 'contacts']);

Route::get('/dashboard/system', [DashboardController::class, 'systems']);

Route::get('/dashboard/gym', [DashboardController::class, 'gym']);

Route::get('/dashboard/personal_record', [DashboardController::class, 'personal_record']);



// DASHBOARD STUDENTS

Route::get('/dashboard/student/profile', [DashboardController::class, 'studentprofile']);

Route::get('/dashboard/student/grades', [DashboardController::class, 'grades']);

Route::get('/dashboard/student/petitions', [DashboardController::class, 'petitions']);

// END

Route::get('/dashboard/class', [DashboardController::class, 'getClass']);

Route::get('/dashboard/registrar/Subjects/{data}', [DashboardController::class, 'getEnlistmentSubjects']);

Route::get('/dashboard/registrar/class/schedule', [DashboardController::class, 'getEnlistmentSubjects']);

Route::get('/registrar/admission/applicant', [DashboardController::class, 'registrar_admission_applicant']);

Route::get('/registrar/admission/applicant/information/{data}', [DashboardController::class, 'registrar_show_applicant_information']);

Route::get('/registrar/admission/evaluation', [DashboardController::class, 'registrar_admission_evaluation']);

Route::get('/registrar/admission/examination', [DashboardController::class, 'registrar_admission_examination']);

Route::get('/registrar/admission/interview', [DashboardController::class, 'registrar_admission_interview']);


// DEVSSSSS
Route::get('/FORM/PANELS/{data}', [DashboardController::class, 'super_admin_get_panels']);

Route::get('/FORM/PANELS/ROWS/{formid}/{panelid}', [DashboardController::class, 'super_admin_get_rows']);

Route::get('/FORM/PANELS/ROWS/COLUMNS/{formid}/{panelid}/{rowid}', [DashboardController::class, 'super_admin_get_cols']);

Route::get('/COLUMN/CONTENTS/{formid}/{panelid}/{rowid}/{colid}', [DashboardController::class, 'super_admin_get_contents']);

Route::get('/CONTENTS/INFO/{data}', [DashboardController::class, 'viewContentInformation']);


Route::post('/LazyInsert', [LazyServices::class, 'lazyInsert']);

Route::post('/LazyUpdate', [LazyServices::class, 'lazyUpdate']);

Route::post('/LazyDelete', [LazyServices::class, 'lazyDelete']);



//ads

Route::get('/Lz/agent/dashboard', [DashboardController::class, 'lzDashboard']);
Route::get('/Lz/head/dashboard', [DashboardController::class, 'lzDashboard_head']);
Route::post('/Lz/updateWallet', [__UNIVERSAL::class, 'ld_topUpCurrentWallet']);
Route::post('/Lz/withDrawWallet', [__UNIVERSAL::class, 'ld_withDrawCurrentWallet']);





