<?php

namespace Alexeysmlk\Framework\Routing;

use Alexeysmlk\Framework\Http\Request;

interface RouterInterface
{
	public function dispatch(Request $request);
}