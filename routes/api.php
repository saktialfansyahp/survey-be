<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/update', [AuthController::class, 'update']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'survey'
], function ($router) {
    Route::post('/create', [SurveyController::class, 'create']);
    Route::get('/getSurvey', [SurveyController::class, 'getSurvey']);
    Route::get('/getSurvey/{id}', [SurveyController::class, 'getbyId']);
    Route::post('/update/{id}', [SurveyController::class, 'update']);
    Route::delete('destroy/{id}', [SurveyController::class, 'destroy']);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'result'
], function ($router) {
    Route::post('/create', [ResultController::class, 'create']);
    Route::get('/getResult', [ResultController::class, 'getResult']);
    Route::get('/getResult/{id}', [ResultController::class, 'getbyId']);
    Route::post('/update/{id}', [ResultController::class, 'update']);
    Route::delete('destroy/{id}', [ResultController::class, 'destroy']);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'question'
], function ($router) {
    Route::post('/create', [QuestionController::class, 'create']);
    Route::get('/getQuestion', [QuestionController::class, 'getQuestion']);
    Route::get('/getQuestion/{id}', [QuestionController::class, 'getbyId']);
    Route::delete('destroy/{id}', [QuestionController::class, 'destroy']);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'questioncategory'
], function ($router) {
    Route::post('/create', [QuestionCategoryController::class, 'create']);
    Route::get('/getQuestionCategory', [QuestionCategoryController::class, 'getQuestionCategory']);
    Route::get('/getQuestionCategory/{id}', [QuestionCategoryController::class, 'getbyId']);
    Route::delete('destroy/{id}', [QuestionCategoryController::class, 'destroy']);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'role'
], function ($router) {
    Route::post('/', [RoleController::class, 'create']);
    Route::get('/', [RoleController::class, 'get']);
    Route::get('/{id}', [RoleController::class, 'getbyId']);
    Route::delete('destroy/{id}', [RoleController::class, 'destroy']);
});
