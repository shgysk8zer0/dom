<?php
/**
 * @author Chris Zuber <shgysk8zer0@gmail.com>
 * @package shgysk8zer0\DOM
 * @subpackage Traits
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
namespace shgysk8zer0\DOM\Traits;
/**
 * Provides methods for creating markup and elements for MathML
 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element
 */
trait Math
{
	/**
	 * [identifier description]
	 * @param  [type] $value      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mi
	 */
	final public function identifier($value, array $attributes = array())
	{
		$mi = $this->createElement('mi', $value);
		array_map([$mi, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $mi;
	}

	/**
	 * [operator description]
	 * @param  [type] $value      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mo
	 */
	final public function operator($value, array $attributes = array())
	{
		$mo = $this->createElement('mo', $value);
		array_map([$mo, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $mo;
	}

	/**
	 * [number description]
	 * @param  [type] $value      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mn
	 */
	final public function number($value, array $attributes = array())
	{
		$mn = $this->createElement('mn', $value);
		array_map([$mn, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $mn;
	}

	/**
	 * [action description]
	 * @param  [type] $type       [description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/maction
	 */
	final public function action($type, array $items, array $attributes = array())
	{
		$attributes['actiontype'] = $type;
		$maction = $this->createElement('maction');
		array_map([$maction, 'appendChild'], $items);
		array_map([$maction, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $maction;
	}

	/**
	 * [root description]
	 * @param  [type] $num        [description]
	 * @param  [type] $pow        [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mroot
	 */
	final public function root($num, $pow, array $attributes = array())
	{
		$mroot = $this->createElement('mroot');
		array_map([$mroot, 'setAttribute'], array_keys($attributes), array_values($attributes));
		$mroot->appendChild($this->createElement('mi', $num));
		$mroot->appendChild($this->createElement('mn', $pow));
		return $mroot;
	}

	/**
	 * [sqrt description]
	 * @param  [type] $num        [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/msqrt
	 */
	final public function sqrt($num, array $attributes = array())
	{
		$msqrt = $this->createElement('msqrt');
		array_map([$msqrt, 'setAttribute'], array_keys($attributes), array_values($attributes));
		$msqrt->appendChild($this->createElement('mi', $num));
		return $msqrt;
	}

	/**
	 * [frac description]
	 * @param  [type] $numerator   [description]
	 * @param  [type] $denominator [description]
	 * @param  [type] $bevelled    [description]
	 * @param  array  $attributes  [description]
	 * @return [type]              [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mfrac
	 */
	final public function frac(
		\DOMElement $numerator,
		\DOMElement $denominator,
		$bevelled = false,
		array $attributes = array()
	)
	{
		$mfrac = $this->createElement('mfrac');
		if ($bevelled) {
			$attributes['bevelled'] = 'true';
		}
		array_map([$mfrac, 'setAttribute'], array_keys($attributes), array_values($attributes));
		$mfrac->appendChild($numerator);
		$mfrac->appendChild($denominator);
		return $mfrac;
	}

	/**
	 * [sub description]
	 * @param  [type] $base       [description]
	 * @param  [type] $subscript  [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/msub
	 */
	final public function sub($base, $subscript, array $attributes = array())
	{
		$msub = $this->createElement('msub');
		$msub->appendChild($this->identifier($base));
		$msub->appendChild($this->number($subscript));
		array_map([$msub, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $msub;
	}

	/**
	 * [sup description]
	 * @param  [type] $base        [description]
	 * @param  [type] $superscript [description]
	 * @param  array  $attributes  [description]
	 * @return [type]              [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/msup
	 */
	final public function sup($base, $superscript, array $attributes = array())
	{
		$msup = $this->createElement('msup');
		$msup->appendChild($this->identifier($base));
		$msup->appendChild($this->number($superscript));
		array_map([$msup, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $msup;
	}

	/**
	 * [pow description]
	 * @param  [type] $base        [description]
	 * @param  [type] $superscript [description]
	 * @param  array  $attributes  [description]
	 * @return [type]              [description]
	 */
	final public function pow($base, $superscript, array $attributes = array())
	{
		return $this->sup($base, $superscript, $attributes);
	}

	/**
	 * [under description]
	 * @param  DOMElement $base        [description]
	 * @param  DOMElement $underscript [description]
	 * @param  array      $attributes  [description]
	 * @return [type]                  [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/munder
	 */
	final public function under(\DOMElement $base, \DOMElement $underscript, array $attributes = array())
	{
		$munder = $this->createElement('munder');
		$munder->appendChild($base);
		$munder->appendChild($underscript);
		array_map([$munder, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $munder;
	}

	/**
	 * [over description]
	 * @param  DOMElement $base       [description]
	 * @param  DOMElement $overscript [description]
	 * @param  array      $attributes [description]
	 * @return [type]                 [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mover
	 */
	final public function over(\DOMElement $base, \DOMElement $overscript, array $attributes = array())
	{
		$mover = $this->createElement('mover');
		$mover->appendChild($base);
		$mover->appendChild($overscript);
		array_map([$mover, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $mover;
	}

	/**
	 * [overUnder description]
	 * @param  DOMElement $base        [description]
	 * @param  DOMElement $underscript [description]
	 * @param  DOMElement $overscript  [description]
	 * @param  array      $attributes  [description]
	 * @return [type]                  [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/munderover
	 */
	final public function overUnder(
		\DOMElement $base,
		\DOMElement $underscript,
		\DOMElement $overscript,
		array $attributes = array()
	)
	{
		$munderover = $this->createElement('munderover');
		$munderover->appendChild($base);
		$munderover->appendChild($underscript);
		$munderover->appendChild($overscript);
		array_map([$munderover, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $munderover;
	}

	/**
	 * [fenced description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mfenced
	 */
	final public function fenced(array $items, array $attributes = array())
	{
		$mfenced = $this->createElement('mfenced');
		array_map([$mfenced, 'appendChild'], $items);
		array_map([$mfenced, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $mfenced;
	}

	/**
	 * [enclose description]
	 * @param  string $notation   [description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/menclose
	 */
	final public function enclose($notation = 'longdiv', array $items, array $attributes = array())
	{
		$attributes['notation'] = $notation;
		$menclose = $this->createElement('menclose');
		array_map([$menclose, 'appendChild'], $items);
		array_map([$menclose, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $menclose;
	}

	/**
	 * [divide description]
	 * @param  DOMElement $num        [description]
	 * @param  DOMElement $by         [description]
	 * @param  array      $attributes [description]
	 * @return [type]                 [description]
	 */
	final public function divide(\DOMElement $num, \DOMElement $by, array $attributes = array())
	{
		return $this->row([$by, $this->enclose('longdiv', [$num], $attributes)]);
	}

	/**
	 * [text description]
	 * @param  [type] $value      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mtext
	 */
	final public function text($value, array $attributes = array())
	{
		$mtext = $this->createElement('mtext', $value);
		array_map([$mtext, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $mtext;
	}

	/**
	 * [string description]
	 * @param  [type] $value      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/ms
	 */
	final public function string($value, array $attributes = array())
	{
		$ms = $this->createElement('ms', $value);
		array_map([$ms, 'setAttribute'], array_keys($attributes), array_values($attributes));
	}

	/**
	 * [glyph description]
	 * @param  [type] $src        [description]
	 * @param  string $alt        [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mglyph
	 */
	final public function glyph($src, $alt = '', array $attributes = array())
	{
		$attributes['src'] = $src;
		$attributes['alt'] = $alt;
		$mglyph = $this->createElement('mglyph');
		array_map([$mglyph, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $mglyph;
	}

	/**
	 * [table description]
	 * @param  array  $atributes [description]
	 * @return [type]            [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mtable
	 */
	final public function table(array $attributes = array())
	{
		$mtable = $this->createElement('mtable');
		array_map([$mtable, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $mtable;
	}

	/**
	 * [tableRow description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mtr
	 */
	final public function tableRow(array $items, array $attributes = array())
	{
		$mtr = $this->createElement('mtr');
		array_map([$mtr, 'appendChild'], $items);
		array_map([$mtr, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $mtr;
	}

	/**
	 * [tableCell description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mtd
	 */
	final public function tableCell(array $items, array $attributes = array())
	{
		$mtd = $this->createElement('mtd');
		array_map([$mtd, 'appendChild'], $items);
		array_map([$mtd, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $mtd;
	}

	/**
	 * [row description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 * @see https://developer.mozilla.org/en-US/docs/Web/MathML/Element/mrow
	 */
	final public function row(array $items, array $attributes = array())
	{
		$mrow = $this->createElement('mrow');
		array_map([$mrow, 'appendChild'], $items);
		array_map([$mrow, 'setAttribute'], array_keys($attributes), array_values($attributes));
		return $mrow;
	}

	/**
	 * [integral description]
	 * @param  mixed   $from [description]
	 * @param  [type]  $to   [description]
	 * @return [type]        [description]
	 */
	final public function integral($from = 0, $to = \shgysk8zer0\DOM\MathML::INFINITY)
	{
		return $this->overUnder(
			$this->operator(\shgysk8zer0\DOM\MathML::INTEGRAL),
			$this->identifier($from),
			$this->identifier($to)
		);
	}

	/**
	 * [naturalLog description]
	 * @param  [type] $num [description]
	 * @return [type]      [description]
	 */
	final public function naturalLog($num)
	{
		return $this->row([
			$this->operator('ln'),
			$this->fenced([$this->number(-1)])
		]);
	}

	/**
	 * [toggle description]
	 * @param  array  $items      [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 */
	final public function toggle(array $items, array $attributes = array())
	{
		return $this->action('toggle', $items, $attributes);
	}

	/**
	 * [statusLine description]
	 * @param  [type] $message    [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 */
	final public function statusLine($message, array $attributes = array())
	{
		return $this->action('statusline', [$this->text($message)], $attributes);
	}

	/**
	 * [toolTip description]
	 * @param  [type] $message    [description]
	 * @param  array  $attributes [description]
	 * @return [type]             [description]
	 */
	final public function toolTip($message, array $attributes = array())
	{
		return $this->action('tooltip', [$this->text($message)], $attributes);
	}
}
