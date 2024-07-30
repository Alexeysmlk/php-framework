<?php

namespace Alexeysmlk\Framework\Container;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
	private array $services = [];

	public function add(string $id, string|object $concrete)
	{
		$this->services[$id] = $concrete;
	}

	public function get(string $id)
	{
		return new $this->services[$id];
	}

	public function has(string $id): bool
	{
		// TODO: Implement has() method.
	}
}