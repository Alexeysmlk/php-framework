<?php

use Alexeysmlk\Framework\Routing\Route;
use App\Controllers\HomeController;
use App\Controllers\PostController;

return [
	Route::get('/', [Homecontroller::class, 'index']),
	Route::get('/posts/{id:\d+}', [PostController::class, 'show']),
];