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

trait HTMLParser
{
	/**
	 *  Load HTML from a string and return the nodes.
	 *  These will need to be imported into the current document
	 *
	 * @param  string $html    HTML to import into a new \DOMDocument
	 * @param  int    $options Libxml paramaters
	 * @return \DOMNodeList    Node List containing the parsed DOM nodes
	 * @see https://secure.php.net/manual/en/domdocument.loadhtml.php
	 */
	final public function parseHTML($html, $options = LIBXML_NOWARNING)
	{
		libxml_use_internal_errors(true);
		$dom = new \DOMDocument('1.0', 'UTF-8');
		$dom->preserveWhiteSpace = false;
		@$dom->loadHTML($html, $options);
		libxml_clear_errors();
		return $dom->documentElement->firstChild->childNodes;
	}

	/**
	 * Parses HTML and imports the nodes
	 *
	 * @param  string $html HTML to import and append
	 * @return self
	 */
	final public function importHTML($html)
	{
		$nodes = $this->parseHTML($html);
		$length = $nodes->length;
		for ($i = 0; $i < $length; $i++) {
			$this->appendChild($this->ownerDocument->importNode($nodes->item($i), true));
		}
		return $this;
	}
	/**
	 *  Load HTML from a file and import the nodes
	 * @param  string $filename    HTML file to import
	 * @param  int    $options     Libxml paramaters
	 * @return self
	 * @see https://secure.php.net/manual/en/domdocument.loadhtmlfile.php
	 */
	final public function importHTMLFile($filename, $options = LIBXML_NOWARNING)
	{
		libxml_use_internal_errors(true);
		$dom = new \DOMDocument('1.0', 'UTF-8');
		$dom->preserveWhiteSpace = false;
		@$dom->loadHTMLFile($filename, $options);
		libxml_clear_errors();
		$nodes = $dom->documentElement->firstChild->childNodes;
		$length = $nodes->length;
		for ($i = 0; $i < $length; $i++) {
			$this->appendChild($this->ownerDocument->importNode($nodes->item($i), true));
		}
		return $this;
	}
}
