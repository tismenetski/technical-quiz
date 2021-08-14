<?php

use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConsumeController;
use App\Http\Controllers\QuestionsController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/consume',[ConsumeController::class,'fetch']);

//Route::post('/answerQuestion', [QuestionsController::class, 'answerQuestion'])->middleware('auth:sanctum');
//Route::post('/index', [QuestionsController::class, 'index'])->middleware('auth:sanctum');



Route::group(['prefix' => 'questions', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [QuestionsController::class, 'index']);
    Route::get('/unAnsweredQuestions', [QuestionsController::class, 'unAnsweredQuestions']);
    Route::get('/answeredQuestions', [QuestionsController::class, 'answeredQuestions']);
    Route::get('/questionsByCategory', [QuestionsController::class, 'questionsByCategory']);
    Route::post('/createNewQuestionnaire', [QuestionsController::class, 'createNewQuestionnaire']);
    Route::post('/answerQuestion', [QuestionsController::class, 'answerQuestion']);


});

Route::group(['prefix' => 'categories', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/categoriesForUser', [CategoryController::class,'categoriesForUser']);


});
