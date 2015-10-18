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
class SVG extends \DOMDocument implements API\Interfaces\Magic_Methods, API\Interfaces\String
{
	use API\Traits\Magic\Call_Setter;
	use Traits\DocumentElementAttributes;
	use Traits\DocumentElementString;

	const XMLNS = 'http://www.w3.org/2000/svg';
	const VERSION = 1.1;
	const CHARSET = 'UTF-8';
	const CONTENT_TYPE = 'image/svg+xml';

	/**
	 * Create a new DOMDocument with SVG as the documentElement
	 *
	 * @param array  $attrs     Array of attributes to set
	 * @param string $charset  Character encoding to use
	 */
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
