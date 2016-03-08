<?php
/**
 * @author Chris Zuber <shgysk8zer0@gmail.com>
 * @package shgysk8zer0\DOM
 * @subpackage Traits
 * @version 0.0.1
 * @since 0.0.1
 * @copyright 2016, Chris Zuber
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
namespace shgysk8zer0\DOM\Traits;

trait AutoAppend
{
	/**
	 * Append items, possibly recursively, by type
	 *
	 * @param  mixed  $item \DOMNode or a collection of \DOMNodes
	 * @return mixed        Whatever was given as input, imported and appended
	 */
	final protected function _appendItem($item)
	{
		if ($item instanceof \DOMNode) {
			if (! $item->ownerDocument === $this->ownerDocument) {
				$this->ownerDocument->importNode($item, true);
			}
			return $this->appendChild($item);
		} elseif (is_callable($item)) {
			return call_user_func([$this, __FUNCTION__], call_user_func($item));
		} elseif (is_string($item)) {
			return $this->appendChild($this->ownerDocument->createTextNode($item));
		} elseif ($item instanceof \DOMNodeList) {
			$items = array();
			foreach($item as $node) {
				array_push($items, $this->appendChild($node));
			}
			return $items;
		} else if (is_array($item)) {
			return array_map([$this, __FUNCTION__], $item);
		}
	}
}
