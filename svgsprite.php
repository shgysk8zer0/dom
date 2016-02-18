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

use \shgysk8zer0\Core_API as API;

/**
 * Class extending SVG for creating SVG Sprites.
 */
class SVGSprite extends SVG implements API\Interfaces\Magic_Methods, API\Interfaces\String
{
	/**
	 * Creates a new instance of SVGSprite
	 *
	 * @param Array $svgs Array of files to create from
	 */
	final public function __construct(Array $svgs)
	{
		parent::__construct();
		array_map([$this, '_createSymbol'], array_values($svgs), array_keys($svgs));
	}

	/**
	 * Imports an SVG file as a new <symbol>
	 *
	 * @param  string $file The name of the file to import from
	 * @return void
	 */
	final private function _createSymbol($file, $id)
	{
		if (! is_string($file)) {
			throw new InvalidArgumentException(sprintf(
				'%s expects a string but got a %s',
				__MEHTOD__,
				gettype($file)
			));
		} else if (! file_exists($file)) {
			throw new Exception(sprintf('%s not found', $file), 1);
		}

		// Create a new SVG from the file
		$svg = parent::loadSVG($file);
		$symbol = $this->documentElement->appendChild($this->createElement('symbol'));
		$symbol->id = is_string($id) ? $id : basename($file, '.svg');
		// Attempt to set `viewBox` from either SVG's viewBox or dimensions
		if (isset($svg->documentElement->viewBox)) {
			$symbol->viewBox = $svg->documentElement->viewBox;
		} else if (isset($svg->documentElement->width, $svg->documentElement->height)) {
			$symbol->viewBox = "0 0 {$svg->documentElement->width} {$svg->documentElement->height}";
		}

		// Import and append SVG's childNodes
		foreach ($svg->documentElement->childNodes as $node) {
			$symbol->appendChild($this->importNode($node, true));
		}
	}
}
