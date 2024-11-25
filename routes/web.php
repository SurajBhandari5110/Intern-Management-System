<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TlInternAssignmentController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\TLController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudyMaterialController;
use App\Http\Controllers\EODController;


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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Public URLs

Route::view('/', 'index');
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/contact', function () {return view('contact');});
Route::view('/about', 'about');
Route::view('/future-proofing', 'future-proofing');


// Team Leader Routes
Route::middleware(['auth', 'role:team_leader'])->group(function () {
    Route::get('/tl/interns', [TlInternAssignmentController::class, 'index'])->name('tl.interns.index'); // Your custom view
    

    Route::get('/tl/dashboard', [TlInternAssignmentController::class, 'dashboard'])->name('tl.dashboard');

    Route::get('/tl/interns/create', [TlInternAssignmentController::class, 'create'])->name('tl.interns.create');
    Route::post('/tl/interns', [TlInternAssignmentController::class, 'store'])->name('tl.interns.store');
    Route::delete('/tl/dashboard/{internId}', [TlInternAssignmentController::class, 'destroy'])->name('tl.interns.destroy');

});

// Intern Routes
Route::middleware(['auth', 'role:intern'])->group(function () {
    Route::get('/intern/dashboard', [InternController::class, 'dashboard'])->name('intern.dashboard');
});

//log out
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//Tracking intern work flow



// Intern Dashboard Routes
Route::middleware(['auth', 'role:intern'])->group(function () {
    Route::get('/intern/assigned-courses', [InternController::class, 'assignedCourses'])->name('intern.assigned.courses');
    Route::get('/intern/tasks', [InternController::class, 'tasks'])->name('intern.tasks');
    Route::get('/intern/progress', [InternController::class, 'progress'])->name('intern.progress');
});


// Route for Assign Course Page
Route::get('/assign-course', [CourseController::class, 'view'])->name('assign.course.view');

// Route for Viewing Intern Progress
Route::get('/intern-progress', [ProgressController::class, 'view'])->name('intern.progress.view');
Route::get('/courses/{id}', [CourseController::class, 'view']);
Route::patch('/interns/{id}/status', [InternController::class, 'updateStatus'])->name('interns.updateStatus');


Route::get('/study-material/view/{table_name}', [TlInternAssignmentController::class, 'viewTable'])
    ->name('study.material.view')
    ->middleware(['auth', 'role:team_leader']); // Add middleware to ensure only authorized users access this

// Study Material Routes

Route::post('/tl/send-study-material', [TlInternAssignmentController::class, 'sendStudyMaterial'])->name('send.study.material');


Route::get('/tl/study-progress/{internId}', [TlInternAssignmentController::class, 'viewStudyProgress'])->name('study.progress');

Route::post('/send-study-material', [TlInternAssignmentController::class, 'sendStudyMaterialToIntern'])->name('send.study.material');
Route::get('/tl/track-performance', [TlInternAssignmentController::class, 'trackPerformance'])->name('tl.track.performance');
Route::middleware(['auth', 'role:intern'])->group(function () {
    Route::get('/intern/assigned-courses', [InternController::class, 'assignedCourses'])->name('intern.assigned.courses');
    Route::get('/intern/course/{id}', [InternController::class, 'viewCourse'])->name('intern.course.view');
    Route::patch('/intern/course/{id}', [InternController::class, 'updateRecord'])->name('intern.course.update');
});







// Display assigned courses
Route::get('/intern/assigned-courses', [InternController::class, 'assignedCourses'])->name('intern.assigned.courses');

// Display course details and update form
Route::get('/intern/course-details/{course}', [InternController::class, 'courseDetails'])->name('intern.course.details');

// Handle course detail updates
Route::post('/intern/course-details/{course}', [InternController::class, 'updateCourseDetails'])->name('intern.course.update');

//EOD



Route::get('/tl/assign-intern', [TlInternAssignmentController::class, 'assignIntern'])->name('tl.assign_intern');
Route::post('tl/assign-intern', [TlInternAssignmentController::class, 'storeAssignment'])->name('tl.project_team.store');

//inter submitting eod
Route::get('intern/eod_form', [InternController::class, 'showEODForm'])->name('interns.eodForm');
Route::post('intern/eod_form', [InternController::class, 'submitEOD'])->name('interns.submitEOD');
//showing eod to TL
Route::get('/tl/eod-reports', [TlInternAssignmentController::class, 'showEODReports'])->name('tl.eod_reports');
//HR form for inter


// Route for filling HR form
Route::view('/intern/hr-form','intern/hr-form');


