<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudientController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\LocalizationController;

use Illuminate\Support\Facades\Auth;
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

/**
 * Lang de site francais et anglais
 */
Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

/**
 * Group d'admin
 */
Route::group(['prefix'=>'admin', 'middleware'=>['admin','auth']], function(){

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

    /**
     * 
     */
    Route::get('Admin-main',[CustomAuthController::class,'admin'])->name('admin.main');

    
});



Route::group(['prefix'=>'article', 'middleware'=>['auth']], function(){

   /**
     * article index
     */
    Route::get('article-index', [ArticleController::class, 'index'])->name('article.index');

  /**
   * article create
   */
  Route::get('article-create', [ArticleController::class, 'create'])->name('article.create');

  /**
   * article create post
   */
  Route::post('article-create', [ArticleController::class, 'store'])->name('article.create.post');

   /**
   * article show
   */
  Route::get('article-show/{article}', [ArticleController::class, 'show'])->name('article.show');

  /**
   * article edit
   */
  Route::get('article-edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
  
   /**
   * article edit update
   */
  Route::put('article-edit/{article}', [ArticleController::class, 'update'])->name('article.update');

     /**
   * article delete
   */
  Route::delete('article-index/{article}', [ArticleController::class, 'destroy'])->name('article.delete');
 
});


/**
 * groupe pour authentication
*/
Route::group(['prefix'=>'auth', 'middleware'=>['auth']], function(){

    /**
     * forum
     */
    Route::get('forum', [CustomAuthController::class, 'forum'])->name('forum');

    /**
     * logout
     */
    Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');
    
     

  

    
});

/************************************ */

/**
 * groupe pour upload files
*/
Route::group(['prefix'=>'files', 'middleware'=>['auth']], function(){


    /**
   * upload file update
   */
  Route::get('upload-file', [FileUploadController::class, 'index'])->name('uploadFile.index');

 
  /**
   * upload file affiche
   */
  Route::get('upload-file-create', [FileUploadController::class, 'create'])->name('uploadFile.create');

  /**
   * upload file ajouter
   */
  Route::post('upload-file-create', [FileUploadController::class, 'store'])->name('uploadFile.create.post');

  /**
   * upload file  show
   */
  Route::get('upload-file-show/{file}', [FileUploadController::class, 'show'])->name('uploadFile.show');

  
  /**
   * upload file  edit
   */
  Route::get('upload-file-edit/{file}', [FileUploadController::class, 'edit'])->name('uploadFile.edit');
  /**
   * upload file  edit
   */
  Route::put('upload-file-edit/{file}', [FileUploadController::class, 'update'])->name('uploadFile.update');

  /**
   * upload file delete
   */
  Route::delete('upload-file/{file}', [FileUploadController::class, 'destroy'])->name('uploadFile.delete');

  /**
   * PDF
   */
  Route::get('upload-file-pdf/{file}', [FileUploadController::class, 'showPDF'])->name('uploadFile.showPdf');

});
/***************************** */
/**
* login
*/
Route::get('login',[CustomAuthController::class,'index'])->name('login');

/**
* login custom admin
*/
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('custom.login');


/**
* Registration
*/
Route::get('registration',[CustomAuthController::class,'create'])->name('registration');

/**
* Registration custom
*/
Route::post('custom-registration', [CustomAuthController::class, 'store'])->name('custom.registration');

/** 
 * 
*/
Route::get('forgot',[CustomAuthController::class,'showForgotForm'])->name('forgot');

/** 
 * 
*/

Route::post('password-forgot',[CustomAuthController::class,'sendResetLink'])->name('password.forgot');

/** 
 * 
*/
Route::get('reset/{token}',[CustomAuthController::class,'showResetForm'])->name('reset');

