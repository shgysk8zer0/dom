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
 * Conditional HTML comments for checking if Internet Explorer
 * @see https://en.wikipedia.org/wiki/Conditional_comment
 */
trait Conditional
{
	private $_ie_subs = [
		'<'  => 'lt',
		'<=' => 'lte',
		'>'  => 'gt',
		'>=' => 'gte',
	];

	/**
	 * Content only shown if IE, optionally comparing version
	 * @param  String $content Content to show if match
	 * @param  Int    $version Optional IE version (5-9, also 10 if not in standards mode)
	 * @param  String $compare Optional comparison to make (<, <=, lt, lte, ...)
	 * @return self
	 * @example $el->ifIE('<b>You are using IE</b>');
	 * @example $el->ifIE('<b>You are using IE 9</b>', 9)
	 * @example $el->ifIE('<b>You are using IE > 9</b>', 9, 'gt')
	 * @example $el->ifIE('<b>You are using IE > 9</b>', 9, '>')
	 */
	public function ifIE($content, $version = null, $compare = null)
	{
		if (is_int($version)) {
			if (is_string($compare) and $compare !== '') {
				if (in_array($compare, array_keys($this->_ie_subs))) {
					$compare = $this->_ie_subs[$compare];
				} elseif (!in_array($compare, $this->_ie_subs)) {
					trigger_error('Invalid IE conditional operator');
				}
				$cond = "[if $compare IE $version]>";
			} else {
				$cond = "[if IE $version]>";
			}
		} else {
			$cond = '[if IE]>';
		}

		$comment = new \DOMComment("{$cond}{$content}<![endif]");
		$this->appendChild($comment);
		return $this;
	}

	/**
	 * Content only shown if not using Internet Explorer (Or when using IE >= 10)
	 * @param  String $content Content to be shown if not IE
	 * @return self
	 */
	public function ifNotIE($content)
	{
		$comment = new \DOMComment('[if !IE]>-->' . $content . '<!--<![endif]');
		$this->appendChild($comment);
		return $this;
	}
}
