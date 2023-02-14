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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
});

Route::prefix('/personal_data')->middleware(['auth', 'verified'])->group( function () {
    Route::get('/', [\App\Http\Controllers\PersonalDataController::class, 'personal_data'])->name('personal_data');
    Route::post('/create', [\App\Http\Controllers\PersonalDataController::class, 'create'])->name('personal_data.create');
    Route::delete('/{$id}', [\App\Http\Controllers\PersonalDataController::class, 'destroy'])->name('personal_data.destroy');
});






require __DIR__.'/auth.php';
