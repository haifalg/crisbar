<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContohformController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// dashboardbootstrap

Route::match(['get', 'post'], '/dashboardbootstrap', function () {
    return view('dashboardbootstrap');
})->middleware(['auth'])->name('dashboardbootstrap');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


// route coa
// Route::get('/coa', [App\Http\Controllers\CoaController::class, 'index']);
// untuk master data coa
// jika ingin menambahkan routes baru selain default resource di tambah di awal
// sebelum route resource
use App\Http\Controllers\CoaController;
Route::get('coa/tabel', [App\Http\Controllers\CoaController::class,'tabel'])->middleware(['auth']);
Route::get('coa/fetchcoa', [App\Http\Controllers\CoaController::class,'fetchcoa'])->middleware(['auth']);
Route::get('coa/fetchAll', [App\Http\Controllers\CoaController::class,'fetchAll'])->middleware(['auth']);
Route::get('coa/edit/{id}', [App\Http\Controllers\CoaController::class,'edit'])->middleware(['auth']);
Route::get('coa/destroy/{id}', [App\Http\Controllers\CoaController::class,'destroy'])->middleware(['auth']);
Route::resource('coa', CoaController::class)->middleware(['auth']);

//route contoh
Route::get('contohdom', [App\Http\Controllers\Contoh1Controller::class,'contohdom']);
Route::get('contohajax', [App\Http\Controllers\Contoh1Controller::class,'contohajax']);

// contoh form
Route::get('contohform/fetchAll', [App\Http\Controllers\ContohformController::class,'fetchAll'])->middleware(['auth']);
Route::get('contohform/fetchcontohform', [App\Http\Controllers\ContohformController::class,'fetchcontohform'])->middleware(['auth']);
Route::get('contohform/edit/{id}', [App\Http\Controllers\ContohformController::class,'edit'])->middleware(['auth']);
Route::get('contohform/destroy/{id}', [App\Http\Controllers\ContohformController::class,'destroy'])->middleware(['auth']);
Route::resource('contohform', ContohformController::class)->middleware(['auth']);

// route ke master data pegawai
use App\Http\Controllers\PegawaiController;
Route::resource('/pegawai', PegawaiController::class)->middleware(['auth']);
Route::get('/pegawai/destroy/{id}', [App\Http\Controllers\PegawaiController::class,'destroy'])->middleware(['auth']);

require __DIR__.'/auth.php';



