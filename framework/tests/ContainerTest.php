<?php

namespace Alexeysmlk\Framework\Tests;

use Alexeysmlk\Framework\Container\Container;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
	public function test_getting_service_from_container()
	{
		$container = new Container();

		$container->add('somecode-class', SomecodeClass::class);

		$this->assertInstanceOf(SomecodeClass::class, $container->get('somecode-class'));
	}
}