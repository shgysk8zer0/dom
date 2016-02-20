<?php
/**
 * @author Chris Zuber <shgysk8zer0@gmail.com>
 * @package shgysk8zer0\DOM
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
namespace shgysk8zer0\DOM;

/**
 * Class extending \DOMDocumentFragment with easier usage
 */
class Fragment extends \DOMDocumentFragment
{
	/**
	 * Create and append \DOMNodes, with attributes, when called as a function
	 *
	 * @param  string $tag_name   Tag name of the node to create
	 * @param  mixed  $content    Content to append to the new node
	 * @param  array  $attributes Key => value array of attributes
	 *
	 * @return \DOMNode
	 */
	final public function __invoke($tag_name, $content = null, Array $attributes = array())
	{
		$node = $this->appendChild($this->ownerDocument->createElement($tag_name));
		if (is_string($content)) {
			$node->appendChild($this->ownerDocument->createTextNode($content));
		} else if ($content instanceof \DOMNode) {
			$node->appendChild($content);
		} elseif ($content instanceof \DOMNodeList) {
			foreach($content as $child) {
				$node->appendChild($child);
			}
		} elseif (is_array($content)) {
			array_map([$node, 'appendChild'], $content);
		}
		array_map([$node, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $node;
	}
}
