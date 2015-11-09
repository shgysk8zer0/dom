<?php
/**
 * @author Chris Zuber <shgysk8zer0@gmail.com>
 * @package shgysk8zer0\DOM
 * @subpackage Interfaces
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
namespace shgysk8zer0\DOM\Interfaces;

interface Math
{
	/**
	 * [identifier description]
	 * @param  [type] $value      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mi
	 */
	public function identifier($value, array $attributes = array());

	/**
	 * [operator description]
	 * @param  [type] $value      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mo
	 */
	public function operator($value, array $attributes = array());

	/**
	 * [number description]
	 * @param  [type] $value      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mn
	 */
	public function number($value, array $attributes = array());

	/**
	 * [action description]
	 * @param  [type] $type       [description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/maction
	 */
	public function action($type, array $items, array $attributes = array());

	/**
	 * [root description]
	 * @param  [type] $num        [description]
	 * @param  [type] $pow        [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mroot
	 */
	public function root($num, $pow, array $attributes = array());

	/**
	 * [sqrt description]
	 * @param  [type] $num        [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/msqrt
	 */
	public function sqrt($num, array $attributes = array());

	/**
	 * [frac description]
	 * @param  [type] $numerator   [description]
	 * @param  [type] $denominator [description]
	 * @param  [type] $bevelled    [description]
	 * @param  array  $attributes  [description]
	 * @return [type]              [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mfrac
	 */
	public function frac(
		\DOMElement $numerator,
		\DOMElement $denominator,
		$bevelled = false,
		array $attributes = array()
	);

	/**
	 * [sub description]
	 * @param  [type] $base       [description]
	 * @param  [type] $subscript  [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/msub
	 */
	public function sub($base, $subscript, array $attributes = array());

	/**
	 * [sup description]
	 * @param  [type] $base        [description]
	 * @param  [type] $superscript [description]
	 * @param  array  $attributes  [description]
	 * @return [type]              [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/msup
	 */
	public function sup($base, $superscript, array $attributes = array());

	/**
	 * [pow description]
	 * @param  [type] $base        [description]
	 * @param  [type] $superscript [description]
	 * @param  array  $attributes  [description]
	 * @return [type]              [description]
	 */
	public function pow($base, $superscript, array $attributes = array());

	/**
	 * [under description]
	 * @param  DOMElement $base        [description]
	 * @param  DOMElement $underscript [description]
	 * @param  array      $attributes  [description]
	 * @return [type]                  [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/munder
	 */
	public function under(\DOMElement $base, \DOMElement $underscript, array $attributes = array());

	/**
	 * [over description]
	 * @param  DOMElement $base       [description]
	 * @param  DOMElement $overscript [description]
	 * @param  array      $attributes [description]
	 * @return [type]                 [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mover
	 */
	public function over(\DOMElement $base, \DOMElement $overscript, array $attributes = array());

	/**
	 * [overUnder description]
	 * @param  DOMElement $base        [description]
	 * @param  DOMElement $underscript [description]
	 * @param  DOMElement $overscript  [description]
	 * @param  array      $attributes  [description]
	 * @return [type]                  [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/munderover
	 */
	public function overUnder(
		\DOMElement $base,
		\DOMElement $underscript,
		\DOMElement $overscript,
		array $attributes = array()
	);

	/**
	 * [fenced description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mfenced
	 */
	public function fenced(array $items, array $attributes = array());

	/**
	 * [enclose description]
	 * @param  string $notation   [description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/menclose
	 */
	public function enclose($notation = 'longdiv', array $items, array $attributes = array());

	/**
	 * [divide description]
	 * @param  DOMElement $num        [description]
	 * @param  DOMElement $by         [description]
	 * @param  array      $attributes [description]
	 * @return [type]                 [description]
	 */
	public function divide(\DOMElement $num, \DOMElement $by, array $attributes = array());

	/**
	 * [text description]
	 * @param  [type] $value      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mtext
	 */
	public function text($value, array $attributes = array());

	/**
	 * [string description]
	 * @param  [type] $value      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/ms
	 */
	public function string($value, array $attributes = array());

	/**
	 * [glyph description]
	 * @param  [type] $src        [description]
	 * @param  string $alt        [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mglyph
	 */
	public function glyph($src, $alt = '', array $attributes = array());

	/**
	 * [table description]
	 * @param  array  $atributes [description]
	 * @return [type]            [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mtable
	 */
	public function table(array $attributes = array());

	/**
	 * [tableRow description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mtr
	 */
	public function tableRow(array $items, array $attributes = array());

	/**
	 * [tableCell description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mtd
	 */
	public function tableCell(array $items, array $attributes = array());

	/**
	 * [row description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mrow
	 */
	public function row(array $items, array $attributes = array());

	/**
	 * [integral description]
	 * @param  mixed   $from [description]
	 * @param  [type]  $to   [description]
	 * @return [type]        [description]
	 */
	public function integral($from = 0, $to = \shgysk8zer0\DOM\MathML::INFINITY);

	/**
	 * [naturalLog description]
	 * @param  [type] $num [description]
	 * @return [type]      [description]
	 */
	public function naturalLog($num);

	/**
	 * [toggle description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 */
	public function toggle(array $items, array $attributes = array());

	/**
	 * [statusLine description]
	 * @param  [type] $message    [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 */
	public function statusLine($message, array $attributes = array());

	/**
	 * [toolTip description]
	 * @param  [type] $message    [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 */
	public function toolTip($message, array $attributes = array());
}
