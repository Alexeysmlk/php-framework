<?php

namespace Alexeysmlk\Framework\Tests;

class SomecodeClass
{
	public function __construct(
		private readonly AreaWeb $areaWeb
	)
	{
	}

	public function getAreaWeb(): AreaWeb
	{
		return $this->areaWeb;
	}
}