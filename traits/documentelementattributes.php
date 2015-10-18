<?php

namespace shgysk8zer0\DOM\Traits;

trait DocumentElementAttributes
{
	final public function __set($name, $value)
	{
		$this->documentElement->setAttribute($name, $value);
	}

	final public function __get($name)
	{
		return $this->documentElement->getAttribute($name);
	}

	final public function __isset($name)
	{
		return $this->documentElement->hasAttribute($name);
	}

	final public function __unset($name)
	{
		return $this->documentElement->removeAttribute($name);
	}
}
