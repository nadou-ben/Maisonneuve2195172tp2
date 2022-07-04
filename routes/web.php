<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudientController;
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
})->name('welcome');
Route::get('etudiant', [EtudientController::class, 'index'])->name('etudiant');
Route::get('etudiant/{etudient}', [EtudientController::class, 'show'])->name('etudiant.show');
/******************************************* */
Route::get('etudiant-create', [EtudientController::class, 'create'])->name('etudiant.create');
Route::post('etudiant-create', [EtudientController::class, 'store'])->name('etudiant.create.post');
/********************************************* */
Route::get('etudiant-edit/{etudient}', [EtudientController::class, 'edit'])->name('etudiant.edit');
Route::put('etudiant-edit/{etudient}', [EtudientController::class, 'update'])->name('etudiant.update');
/********************************************** */
Route::delete('etudiant/{etudient}', [EtudientController::class, 'destroy'])->name('etudiant.delete');