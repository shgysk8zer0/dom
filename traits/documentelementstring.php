<?php

namespace shgysk8zer0\DOM\Traits;

trait DocumentElementString
{
	final public function __toString()
	{
		return $this->saveXML($this->documentElement);
	}
}
