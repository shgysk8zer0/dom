<?php
/**
 * @author Chris Zuber <shgysk8zer0@gmail.com>
 * @package shgysk8zer0\DOM
 * @version 0.0.1
 * @since 0.0.1
 * @copyright 2015, Chris Zuber
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (GPL-2.0)
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Library General Public
 * License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Library General Public License for more details.
 *
 * You should have received a copy of the GNU Library General Public
 * License along with this library; if not, write to the
 * Free Software Foundation, Inc., 51 Franklin St, Fifth Floor,
 * Boston, MA  02110-1301, USA.
 */
namespace shgysk8zer0\DOM;

use \shgysk8zer0\Core_API as API;

/**
 * Class for creating and working with MathML documents
 */
final class MathML extends \DOMDocument implements Interfaces\Math, API\Interfaces\String
{
	const XMLNS        = 'http://www.w3.org/1998/Math/MathML';
	const CONTENT_TYPE = 'application/mathml+xml';
	const CHARSET      = 'UTF-8';
	const VERSION      = '1.0';

	use Traits\XMLString;
	use Traits\DOMElement;
	use Traits\Math;

	/**
	 * Creates a new DOMDocument and appends <math> node
	 * @param array $attributes Array of attributes to set on <math>
	 */
	public function __construct(array $attributes = array())
	{
		parent::__construct(self::VERSION, self::CHARSET);
		$this->registerNodeClass('\\DOMElement', '\\' . __NAMESPACE__ . '\\' . 'XMLElement');
		$this->appendChild($this->createElementNS(self::XMLNS, 'math'));
		array_map(
			array($this->documentElement, 'setAttribute'),
			array_keys($attributes),
			array_values($attributes)
		);
	}
}
