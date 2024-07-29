<?php

namespace Alexeysmlk\Framework\Http;

use Alexeysmlk\Framework\Http\Exceptions\HttpException;
use Alexeysmlk\Framework\Http\Exceptions\MethodNotAllowedException;
use Alexeysmlk\Framework\Http\Exceptions\RouteNotFoundException;
use Alexeysmlk\Framework\Routing\RouterInterface;

class Kernel
{
	public function __construct(
		private RouterInterface $router
	) {
	}

	public function handle(Request $request): Response
	{
		try {
			[$routeHandler, $vars] = $this->router->dispatch($request);

			$response = call_user_func_array($routeHandler, $vars);
		} catch (HttpException $e) {
			$response = new Response($e->getMessage(), $e->getStatusCode());
		} catch (\Throwable $e) {
			$response = new Response($e->getMessage(), 500);
		}

		return $response;
	}
}