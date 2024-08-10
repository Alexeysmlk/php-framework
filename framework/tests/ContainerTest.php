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

	public function test_recursive_autowired()
	{
		$container = new Container();

		$container->add('somecode-class', SomecodeClass::class);

		/** @var SomecodeClass $somecode */
		$somecode = $container->get('somecode-class');

		$areaweb = $somecode->getAreaWeb();

		$this->assertInstanceOf(AreaWeb::class, $areaweb);
		$this->assertInstanceOf(YouTube::class, $areaweb->getYouTube());
		$this->assertInstanceOf(Telegram::class, $areaweb->getTelegram());
	}
}