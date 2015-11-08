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
	public function frac($numerator, $denominator, $bevelled = false, array $attributes = array());

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
	 * [fenced description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mfenced
	 */
	public function fenced(array $items, array $attributes = array());

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
}
