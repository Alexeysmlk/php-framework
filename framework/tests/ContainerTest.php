<?php

namespace Alexeysmlk\Framework\Tests;

use Alexeysmlk\Framework\Container\Container;
use Alexeysmlk\Framework\Container\Exceptions\ContainerException;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
	public function test_getting_service_from_container()
	{
		$container = new Container();

		$container->add('somecode-class', SomecodeClass::class);

		$this->assertInstanceOf(SomecodeClass::class, $container->get('somecode-class'));
	}

	public function test_container_has_exception_ContainerException_if_add_wrong_service()
	{
		$container = new Container();

		$this->expectException(ContainerException::class);

		$container->add('no-class');

	}

	public function test_has_method()
	{
		$container = new Container();

		$container->add('somecode-class', SomecodeClass::class);

		$this->assertTrue($container->has('somecode-class'));
		$this->assertFalse($container->has('no-class'));

	}
}