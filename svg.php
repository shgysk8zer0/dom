<?php

namespace shgysk8zer0\DOM;

use \shgysk8zer0\Core_API as API;
class SVG extends \DOMDocument implements API\Interfaces\Magic_Methods, API\Interfaces\String
{
	use API\Traits\Magic\Call_Setter;
	use Traits\DocumentElementAttributes;
	use Traits\DocumentElementString;

	const XMLNS = 'http://www.w3.org/2000/svg';
	const VERSION = 1.1;
	const CHARSET = 'UTF-8';
	const CONTENT_TYPE = 'image/svg+xml';

	public function __construct(array $attrs = array(), $charset = self::CHARSET)
	{
		parent::__construct('1.0', $charset);
		$this->registerNodeClass('\\DOMElement', '\\' . __NAMESPACE__ . '\\' . 'XMLElement');
		$this->appendChild($this->createElement('svg'));
		$attrs['xmlns'] = self::XMLNS;
		$attrs['version'] = self::VERSION;

		array_map(
			[$this->documentElement, 'setAttribute'],
			array_keys($attrs),
			array_values($attrs)
		);
	}
}
