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
 * Class extending DOMElement and making use of several traits
 */
class HTMLElement extends \DOMElement
implements API\Interfaces\Magic_Methods, API\Interfaces\toString,
Interfaces\DOMDocument, Interfaces\HTMLDocument
{
	use Traits\DOMDocument;
	use Traits\HTMLDocument;
	use Traits\Attributes;
	use Traits\HTMLString;
	use Traits\HTMLParser;
	use Traits\DOMElement;
	use Traits\XPath;
	use API\Traits\Magic\Call_Setter;
	use Traits\InvokeImporter;
	use Traits\AutoAppend;
	use Traits\Conditional;

	/**
	 * Import and append a node
	 *
	 * @param  DOMNode $node Node to append
	 * @return DOMNode        The appended node
	 */
	public function import($node)
	{
		if ($node instanceof \DOMNode) {
			return $this->appendChild($this->ownerDocument->importNode($node, true));
		} elseif (is_callable($node)) {
			return call_user_func([$this, __FUNCTION__], $node);
		} elseif (is_array($node)) {
			return array_map([$this, __FUNCTION__], $node);
		}
	}
}
