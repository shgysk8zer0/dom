<?php
/**
 * @author Chris Zuber <shgysk8zer0@gmail.com>
 * @package shgysk8zer0\DOM
 * @subpackage Traits
 * @version 0.0.1
 * @since 0.0.1
 * @copyright 2017, Chris Zuber
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

/**
 * A set of methods particularly useful to \DOMElement classes
 */
trait DOMElement
{
	/**
	 * Short-hand method for `$element->appendChild($dom->createElement()...)`
	 * Also sets attriutes from an array after appending
	 *
	 * @param  string $tag        The name for the new element
	 * @param  string $content    The text content for the new element
	 * @param  array  $attributes An optional array of attributes to set
	 * @return \DOMElement        The newly created and appended node
	 */
	final public function append(
		$tag,
		$content          = null,
		array $attributes = array(),
		array $children   = array()
	)
	{
		$node = $this->appendChild($this->createElement($tag, $content));
		array_map(
			[$node, 'setAttribute'],
			array_keys($attributes),
			array_values($attributes)
		);

		foreach ($children as $child) {
			call_user_func_array([$node, __FUNCTION__], $child);
		}

		return $node;
	}
}
