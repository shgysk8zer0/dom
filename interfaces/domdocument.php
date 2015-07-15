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
 * This interface contains only markup language agnostic methods, so it will not
 * contain any XML or HTML specific methods.
 *
 * This also does not contain any methods which would be specific to \DOMDocumnent,
 * as creating nodes, etc. is useful, but validating documents is not.
 *
 * @see https://php.net/manual/en/class.domdocument.php
 */
Interface DOMDocument
{
	/**
	 * Create new attribute
	 *
	 * @param  string $name The name of the attribute.
	 * @return \DOMAttr     The new DOMAttr or FALSE if an error occurred.
	 */
	public function createAttribute($name);

	/**
	 *  Create new attribute node with an associated namespace
	 *
	 * @param  string $namespaceURI  The URI of the namespace.
	 * @param  string $qualifiedName The tag name and prefix of the attribute, as prefix:tagname.
	 * @return \DOMAttr              The new DOMAttr or FALSE if an error occurred.
	 */
	public function createAttributeNS($namespaceURI, $qualifiedName);

	/**
	 * Create new cdata node
	 *
	 * @param  string           $string The content of the cdata.
	 * @return \DOMCDATASection         The new DOMCDATASection or FALSE if an error occurred.
	 */
	public function createCDATASection($string);

	/**
	 * Create new comment node
	 *
	 * @param  string $data The content of the comment.
	 * @return \DOMComment  The new DOMComment or FALSE if an error occurred.
	 */
	public function createComment($data);

	/**
	 * Create new document fragment
	 *
	 * @param void
	 * @return \DOMDocumentFragment The new DOMDocumentFragment or FALSE if an error occurred.
	 */
	public function createDocumentFragment();

	/**
	 * Create new element node
	 *
	 * @param  string $name The tag name of the element.
	 * @param  string $vaue The value of the element.
	 *
	 * @return \DOMElement  Returns a new instance of class DOMElement
	 */
	public function createElement($name, $vaue = null);

	/**
	 * Create new element node with an associated namespace
	 *
	 * @param  string $namespaceURI  The URI of the namespace.
	 * @param  string $qualifiedName The qualified name of the element, as prefix:tagname.
	 * @param  string $value         The value of the element.
	 * @return \DOMElement           The new DOMElement or FALSE if an error occurred.
	 */
	public function createElementNS($namespaceURI, $qualifiedName, $value = null);

	/**
	 * Create new entity reference node
	 *
	 * @param  string $name          The content of the entity reference
	 * @return \DOMEntityReference   The new DOMEntityReference or FALSE if an error occurred.
	 */
	public function createEntityReference($name);

	/**
	 * Creates new PI node
	 *
	 * @param  string $target            The target of the processing instruction.
	 * @param  string $data              The content of the processing instruction.
	 * @return \DOMProcessingInstruction The new DOMProcessingInstruction or FALSE if an error occurred.
	 */
	public function createProcessingInstruction($target, $data);

	/**
	 * Create new text node
	 *
	 * @param  string $content The content of the text.
	 * @return \DOMText        The new DOMText or FALSE if an error occurred.
	 */
	public function createTextNode($content);

	/**
	 * Searches for an element with a certain id
	 *
	 * @param  string $elementID The unique id value for an element.
	 * @return \DOMElement       Returns the DOMElement or NULL if the element is not found.
	 */
	public function getElementById($elementID);

	/**
	 * Searches for all elements with given local tag name
	 *
	 * @param  string $name The local name (without namespace) of the tag to match on.
	 * @return \DOMNodelist A new DOMNodeList object containing all the matched elements.
	 */
	public function getElementsByTagName($name);

	/**
	 * Searches for all elements with given tag name in specified namespace
	 *
	 * @param  string $namespaceURI The namespace URI of the elements to match on.
	 * @param  string $localName    The local name of the elements to match on.
	 * @return \DOMNodeList         A new DOMNodeList object containing all the matched elements.
	 */
	public function getElementsByTagNameNS($namespaceURI , $localName );

	/**
	 * Import node into current document
	 *
	 * @param  DOMNode $node The node to import.
	 * @param  bool    $deep Whether or not to recursively import subtree into current document
	 * @return bool          The copied node or FALSE
	 */
	public function importNode(\DOMNode $node, $deep);
}
