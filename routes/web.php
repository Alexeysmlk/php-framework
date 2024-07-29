<?php

use Alexeysmlk\Framework\Http\Response;
use Alexeysmlk\Framework\Routing\Route;
use App\Controllers\HomeController;
use App\Controllers\PostController;

return [
	Route::get('/', [Homecontroller::class, 'index']),
	Route::get('/posts/{id:\d+}', [PostController::class, 'show']),
	Route::get('/hello/{name}', function(string $name) {
		return new Response("Hello, $name");
	}),
];