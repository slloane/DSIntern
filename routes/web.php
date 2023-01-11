<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\HR\OffreStageController;
use App\Http\Controllers\HR\StagiaireController;

use \App\Http\Controllers\Interns\DemandeStageController;



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
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PDFController;
 
Route::get('create-pdf-file', [PDFController::class, 'index']);

  
Route::get('file-upload', [FileUploadController::class, 'fileUpload'])->name('file.upload');
Route::post('file-upload', [FileUploadController::class, 'fileUploadPost'])->name('file.upload.post');
Route::get('/', function () {
    return view('acceuil');
});

Route::get('/offres_stage', [OffreStageController::class, 'all_offres'])->name('offres_stage');



Route::group(['middleware' => 'auth'], function() {

   Route::group(['middleware' => 'role:hr', 'prefix' => 'hr', 'as' => 'hr.'], function() {

       #Route::resource('demandes_stage', \App\Http\Controllers\Interns\DemandeStageController::class);

       #Route::get('demandes_stage',['as'=>'demandes_stage','uses'=>'\App\Http\Controllers\Interns\DemandeStageController@all_demandes']);
       Route::get('/receiveddemandes_stage', [DemandeStageController::class, 'all_demandes'])->name('receiveddemandes_stage');
       Route::post('/receiveddemandes_stage/supprimer/{id}', [DemandeStageController::class, 'destroy'])->name('receiveddemandes_stage.supprimer');
       Route::post('/receiveddemandes_stage/valider/{id}', [DemandeStageController::class, 'valider'])->name('receiveddemandes_stage.valider');
       Route::post('/receiveddemandes_stage/confirmer/{id}', [DemandeStageController::class, 'confirmer'])->name('receiveddemandes_stage.confirmer');

      //Route::get('/mes_stagiaires', [DemandeStageController::class, 'getStagiaires'])->name('mes_stagiaires');
      // Route::post('/mes_stagiaires/supprimer/{id}', [DemandeStageController::class, 'destroy'])->name('mes_stagiaires.supprimer');
       Route::get('/mes_stagiaires/generer_attestation', [PDFController::class, 'index'])->name('mes_stagiaires.generer_attestation');
       Route::post('/mes_stagiaires/store/{id}', [StagiaireController::class, 'store'])->name('mes_stagiaires.store');

       Route::post('/mes_stagiaires/stagiaire/{id}/attestation/upload/', [StagiaireController::class, 'upload_attestation'])->name('mes_stagiaires.stagiaire.attestation.upload');
       Route::get('/mes_stagiaires/stagiaire/{id}/attestation/', [StagiaireController::class, 'upload'])->name('mes_stagiaires.stagiaire.attestation');
       Route::post('/mes_stagiaires/supprimer/{id}', [StagiaireController::class, 'destroy'])->name('mes_stagiaires.supprimer');
       Route::get('/mes_stagiaires', [StagiaireController::class, 'index'])->name('mes_stagiaires');

       //Route::resource('mes_stagiaires', \App\Http\Controllers\HR\StagiaireController::class);




      # Route::get('demandes_stage', '[\App\Http\Controllers\Interns\DemandeStageController::class, 'all_demandes']');

       Route::get('mesoffres_stage/show', 'OffreStageController@show');   
       Route::resource('mesoffres_stage', \App\Http\Controllers\HR\OffreStageController::class);
       Route::resource('documents_stagiaires', \App\Http\Controllers\HR\DocumentStagiaireController::class);

   });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    });
    Route::group(['middleware' => 'role:intern', 'prefix' => 'intern', 'as' => 'intern.'], function() {
        
        Route::get('/mes_docs', [StagiaireController::class, 'mes_docs'])->name('mes_docs');


        Route::resource('demandes_stage', \App\Http\Controllers\Interns\DemandeStageController::class);
        Route::resource('documents_stage', \App\Http\Controllers\Interns\DocumentStageController::class);
       # Route::get('offres_stage/{id}', [DemandeStageController::class, 'postulerOffre']);


    });
});
