<?php

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

Route::post('/v1/login', 'Users\LoginController');

Route::get('/v1/forums', 'SubForums\FindAllSubForumsController');
Route::get('/v1/forum/{subForumId}', 'SubForums\GetSubForumController');

Route::get('/v1/post/{postId}', 'Posts\GetPostController');
Route::post('/v1/post', 'Posts\CreatePostController');
Route::put('/v1/post/{postId}', 'Posts\UpdatePostController');

Route::post('/v1/response', 'Responses\CreateResponseController');
Route::put('/v1/response/{responseId}', 'Responses\UpdateResponseController');
