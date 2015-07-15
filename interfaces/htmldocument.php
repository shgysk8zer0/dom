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

/**
 * Interface to provide \DOMDocument methods to any \DOMNode class, most likely
 * by aliasing the method to `$node->ownerDocument` methods.
 *
 * This interface contains only HTML methods, so it will not
 * contain any XML specific or generic methods
 *
 * Note that not all methods contain all argument to maintain compatibility with
 * \DOMDocument class itself.
 *
 * @see https://php.net/manual/en/class.domdocument.php
 */
Interface HTMLDocument
{
	/**
	 *  Load HTML from a string
	 *
	 * @param  string $source  The HTML string.
	 * @param  int    $options Additional Libxml parameters.
	 * @return bool            Returns TRUE on success or FALSE on failure.
	 */
	public function loadHTML($source, $options = 0);

	/**
	 * Load HTML from a file
	 *
	 * @param  string $filename The path to the HTML file.
	 * @param  int    $options  Additional Libxml parameters.
	 * @return bool             Returns TRUE on success or FALSE on failure.
	 */
	public function loadHTMLFile($filename, $options = 0);

	/**
	 * Dumps the internal document into a string using HTML formatting
	 *
	 * @param  \DOMNode $node Optional parameter to output a subset of the document.
	 * @return string         Returns the HTML, or FALSE if an error occurred.
	 */
	public function saveHTML();

	/**
	 * Dumps the internal document into a file using HTML formatting
	 *
	 * @param  string $filename The path to the saved HTML document.
	 * @return int              Returns the number of bytes written or FALSE if an error occurred.
	 */
	public function saveHTMLFile($filename);
}
