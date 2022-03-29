<?php

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
use App\Http\Controllers\AjaxBOOKCRUDController;
use App\Http\Controllers\AjaxRESULTSCRUDController;
use App\Http\Controllers\AjaxTERMINOLOGYCRUDController;
use App\Http\Controllers\AjaxCOMMENTCRUDController;

Route::get('ajax-book-crud', [AjaxBOOKCRUDController::class, 'index']);
Route::get('ajax-results-crud', [AjaxCOMMENTCRUDController::class, 'index']);
Route::get('ajax-terminology-crud', [AjaxCOMMENTCRUDController::class, 'index']);

// Route::post('add-update-book', [AjaxBOOKCRUDController::class, 'store']);
// Route::post('edit-book', [AjaxBOOKCRUDController::class, 'edit']);
// Route::post('delete-book', [AjaxBOOKCRUDController::class, 'destroy']);

Route::post('add-update-result-comment', [AjaxRESULTSCRUDController::class, 'store']);
Route::post('edit-result-comment', [AjaxRESULTSCRUDController::class, 'edit']);
Route::post('delete-result-comment', [AjaxRESULTSCRUDController::class, 'destroy']);

Route::post('add-update-terminology-comment', [AjaxTERMINOLOGYCRUDController::class, 'store']);
Route::post('edit-terminology-comment', [AjaxTERMINOLOGYCRUDController::class, 'edit']);
Route::post('delete-terminology-comment', [AjaxTERMINOLOGYCRUDController::class, 'destroy']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('testing-code', function () {
    return view('testing-code');
});

Route::get('comment-message', function () {
    return view('comment-message');
});

