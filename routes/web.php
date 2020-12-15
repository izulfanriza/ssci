<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TryoutController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\HasilTryoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UniversitasController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\HasilTryoutSiswaController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\UpgradeController;
use App\Http\Controllers\ProfilController;

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
    return view('landing');
});
Route::get('landing/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// role admin
Route::group(['middleware' => ['web', 'auth', 'admin', ]], function () {
	Route::resource('tryout', TryoutController::class);
	Route::resource('peserta', PesertaController::class);
	Route::get('peserta-download-template', [PesertaController::class, 'downloadTemplate'])->name('peserta.download_template');
	Route::get('peserta-upload/{tryout_id}', [PesertaController::class, 'upload'])->name('peserta.upload');
	Route::post('peserta-upload', [PesertaController::class, 'goUpload'])->name('peserta.goupload');
	Route::resource('hasiltryout', HasilTryoutController::class);
	Route::resource('user', UserController::class);
	Route::resource('universitas', UniversitasController::class);
	Route::resource('cluster', ClusterController::class);
	Route::resource('programstudi', ProgramStudiController::class);
	Route::resource('jurusan', JurusanController::class);
	Route::resource('mapel', MapelController::class);
});
// role siswapremium
Route::group(['middleware' => ['web', 'auth', 'siswapremium', ]], function () {
	Route::resource('hasiltryoutsiswa', HasilTryoutSiswaController::class);
});

Route::group(['middleware' => ['web', 'auth', 'siswabiasa', ]], function () {
	Route::resource('simulasi', SimulasiController::class);
	Route::resource('upgrade', UpgradeController::class);
});
// semua user
Route::resource('profil', ProfilController::class);