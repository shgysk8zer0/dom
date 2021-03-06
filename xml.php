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

class XML extends \DOMDocument implements Interfaces\DOMDocument, Interfaces\XMLDocument
{
	use Traits\XMLString;
	use Traits\XPath;
	use Traits\XSL;
	use \shgysk8zer0\Core_API\Traits\GetInstance;

	/**
	 * Creates a new instance of an XML Document
	 *
	 * @param string $root_el  the `tagName` for `:root`
	 * @param string $ns_URI   Namespacce  URI
	 * @param string $version  XML version
	 * @param string $encoding Encodiing of the document
	 */
	public function __construct(
		$root_el,
		$ns_URI         = null,
		$version        = '1.0',
		$encoding       = 'UTF-8'
	)
	{
		parent::__construct($version, $encoding);
		$this->registerNodeClass('\\DOMElement', '\\' . __NAMESPACE__ . '\\' . 'XMLElement');
		$this->registerNodeClass('\\DOMDocumentFragment', '\\' . __NAMESPACE__ . '\\' . 'Fragment');
		if (filter_var($ns_URI, FILTER_VALIDATE_URL)) {
			$this->appendChild($this->createElementNS($ns_URI, $root_el));
		} else {
			$this->appendChild($this->createElement($root_el));
		}
	}
}
