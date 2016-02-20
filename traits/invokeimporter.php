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

/**
 * Trait providing an invoke method which appends nodes returned from
 * PHP scripts.
 */
trait InvokeImporter
{
	/**
	 * The base path to load PHP sripts from
	 *
	 * @var string
	 */
	public static $import_path = '';

	/**
	 * Loads PHP scripts and imports any returned \DOMNodes
	 *
	 * @param string[, string...] Scripts to import from
	 * @return array All of the imported \DOMNodes
	 */
	final public function __invoke()
	{
		$imported = array_map([$this, '_importFromFile'], func_get_args());
		return array_map([$this, '_appendItem'], $imported);
	}

	/**
	 * `require` a file, prefixing the path with $imported_path and adding extension
	 *
	 * @param  string $script The filename or path
	 * @return mixed         Whatever is returned from the PHP script
	 */
	final private function _importFromFile($script)
	{
		$ext = pathinfo($script, PATHINFO_EXTENSION);
		if (empty($ext)) {
			$script .= '.php';
		}
		return require static::$import_path . DIRECTORY_SEPARATOR . $script;
	}

	abstract function _appendItem($item);
}
