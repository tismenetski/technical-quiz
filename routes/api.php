<?php

use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\ConsumeController;
use App\Http\Controllers\QuestionsController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/consume',[ConsumeController::class,'fetch']);

//Route::post('/answerQuestion', [QuestionsController::class, 'answerQuestion'])->middleware('auth:sanctum');
//Route::post('/index', [QuestionsController::class, 'index'])->middleware('auth:sanctum');

Route::group(['prefix' => 'books', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [BookController::class, 'index']);
    Route::post('add', [BookController::class, 'add']);
    Route::get('edit/{id}', [BookController::class, 'edit']);
    Route::post('update/{id}', [BookController::class, 'update']);
    Route::delete('delete/{id}', [BookController::class, 'delete']);
});

Route::group(['prefix' => 'questions', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [QuestionsController::class, 'index']);
    Route::get('/unAnsweredQuestions', [QuestionsController::class, 'unAnsweredQuestions']);
    Route::get('/answeredQuestions', [QuestionsController::class, 'answeredQuestions']);
    Route::get('/questionsByCategory', [QuestionsController::class, 'questionsByCategory']);
});
