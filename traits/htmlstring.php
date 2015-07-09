<?php
/**
 * @author Chris Zuber <shgysk8zer0@gmail.com>
 * @package shgysk8zer0\PHP_DOM
 * @subpackage Traits
 * @version 0.0.1
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
namespace shgysk8zer0\PHP_DOM\Traits;

/**
 * Creates __toString methods for both DOMDocument and DOMElement with HTML output
 */
trait HTMLString
{
	/**
	 * Returns the DOMDocument or DOMElement as an HTML string
	 *
	 * @param void
	 * @return string The HTML of the Document or Element
	 */
	final public function __toString()
	{
		if ($this instanceof \DOMDocument) {
			return $this->saveHTML();
		} else {
			return $this->ownerDocumennt->saveHTML($this);
		}
	}
}
