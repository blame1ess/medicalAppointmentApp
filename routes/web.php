<?php
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/{id}/destroy', [\App\Http\Controllers\DashboardController::class, 'delete'])->middleware(['auth', 'verified'])->name('dashboard.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/appointments')->middleware(['auth', 'verified'])->group( function () {
    Route::get('/', [AppointmentsController::class, 'index'])->name('appointments');
    Route::get('/search', [AppointmentsController::class, 'search'])->name('appointments.search');
    Route::get('/create/{name}', [AppointmentsController::class, 'create'])->name('appointments.create');
    Route::post('/store', [AppointmentsController::class, 'store'])->name('appointments.store');
    //Route::get('/{id}/edit', [AppointmentsController::class, 'edit'])->name('appointments.edit');
    Route::delete('/{id}/destroy', [AppointmentsController::class, 'destroy'])->name('appointments.destroy');
});

Route::prefix('personal_data')->middleware(['auth', 'verified'])->group( function () {
    Route::get('/', [\App\Http\Controllers\PersonalDataController::class, 'personal_data'])->name('personal_data');
    Route::put('/create', [\App\Http\Controllers\PersonalDataController::class, 'create'])->name('personal_data.create');
    Route::delete('/{id}/destroy', [\App\Http\Controllers\PersonalDataController::class, 'destroy'])->name('personal_data.destroy');
});

Route::middleware(['auth', 'verified'])->get('FAQ', [\App\Http\Controllers\FaqController::class, 'index'])->name('faq');

Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group( function () {
    Route::get('/appointments', [\App\Http\Controllers\Admin\adminAppointmentsController::class, 'index'])->name('admin.appointments');
    Route::get('/appointments/{id}/accepted', [\App\Http\Controllers\Admin\adminAppointmentsController::class, 'accept'])->name('admin.accept');
    Route::get('/appointments/{id}/declined', [\App\Http\Controllers\Admin\adminAppointmentsController::class, 'decline'])->name('admin.decline');

    Route::get('manage_staff', [\App\Http\Controllers\Admin\manageStaffController::class, 'index'])->name('manage_staff');
    Route::get('search', [\App\Http\Controllers\Admin\manageStaffController::class, 'search'])->name('search');
    Route::post('store', [\App\Http\Controllers\Admin\manageStaffController::class, 'store'])->name('admin.store');
});

Route::prefix('doctor')->middleware('auth', 'verified', 'doctor')->group( function () {
    Route::get('/personal_data', [\App\Http\Controllers\Doctor\DoctorPersonalDataController::class, 'index'])->name('doctor.personal_data');
    Route::put('/personal_data/store', [\App\Http\Controllers\Doctor\DoctorPersonalDataController::class, 'store'])->name('doctor.personal_data.store');
    Route::post('personal_data/update', [\App\Http\Controllers\Doctor\DoctorPersonalDataController::class, 'update'])->name('doctor.personal_data.update');
    Route::get('manage_requests', [\App\Http\Controllers\Doctor\ManageRequestsController::class, 'index'])->name('doctor.manage_requests');
});






require __DIR__.'/auth.php';
