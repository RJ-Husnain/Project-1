<?php
use App\Services\Route;
use App\Middleware\{
    Auth,
    Guest};

Route::get('login','loginController', 'index', [Guest::class]);
Route::get('register','RegisterController', 'index', [Guest::class]);
Route::post('submit-register','RegisterController', 'register', [Guest::class]);
Route::post('submit-login','loginController', 'login', [Guest::class]);

Route::get('logout','DashboardController', 'logout',[Auth::class]);
Route::get('welcome','DashboardController', 'index',[Auth::class]);

Route::get('','HomeController', 'index');