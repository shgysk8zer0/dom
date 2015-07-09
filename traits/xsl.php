<?php
/**
 * @author Chris Zuber <shgysk8zer0@gmail.com>
 * @package shgysk8zer0\PHP_DOM
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
namespace shgysk8zer0\PHP_DOM\Traits;

/**
 * Trait for Creating XSL templates and setting them on XML Documents
 */
trait XSL
{
	/**
	 * Adds an xml-stylesheet at the beginning of an XML DOMDocument
	 *
	 * @param string $href The source URI of the stylesheet
	 * @param string $type The type attribute, defaulting to "text/xsl"
	 * @return void
	 */
	public function addXSLStylesheet($href, $type = 'text/xsl')
	{
		$data = sprintf('type="%s" href="%s"', $type, $href);
		$xsl = $this->createProcessingInstruction('xml-stylesheet', $data);

		$this->insertBefore($xsl, $this->documentElement);
	}

	/**
	 * Creates and returns a new `xsl:stylesheet` with all attributes set
	 *
	 * @param  string $version The version (e.g. "1.0") attribute to set
	 * @return \DOMElement     The created element with namespace & attributes set
	 */
	public function createXSLStylesheet($version = self::VERSION)
	{
		$xsl = $this->createElementNS(self::XSL_URI, self::TAGNAME);
		$xsl->setAttribute('version', $version);
		$xsl->setAttributeNS(self::XMLNS, self::XSLNS, self::XSL_URI);
		return $xsl;
	}

	/**
	 * Creates and returns a new `<xsl:template>` element
	 *
	 * @param  string $match The XPath to match for the template
	 * @return \DOMElement   `<xsl:template match=""/>`
	 */
	public function createXSLTemplate($match = '/')
	{
		$xsl = $this->_createElement('template');
		$xsl->setAttribute('match', $match);
		return $xsl;
	}

	/**
	 * Creates and returns a new `<xsl:for-each>` element
	 *
	 * @param string $select The XPath to iterate through
	 * @return \DOMElement   `<xls:for-each select=""/>`
	 */
	public function XSLforEach($select)
	{
		$xsl = $this->_createElement('for-each');
		$xsl->setAttribute('select', $select);
		return $xsl;
	}

	/**
	 * Creates and returns a new `<xsl:value-of>` element
	 *
	 * @param string $select The XPath of the node to retrieve value from
	 * @return               `<xsl:value-of select=""/>`
	 */
	public function XSLValueOf($select)
	{
		$xsl = $this->_createElement('value-of');
		$xsl->setAttribute('select', $select);
		return $xsl;
	}

	/**
	 * Private method to provide standardized means of creating XSL nodes
	 * Uses `ownerDocument` when called from `DOMElement`
	 *
	 * @param  string $tagname The base element name
	 * @param  string $prefix  Namespace prefix of element
	 * @return \DOMElement     `<prefix:tagname/>`
	 */
	private function _createElement($tagname, $prefix = 'xsl')
	{
		if ($this instanceof \DOMDocument) {
			$xsl = $this->createElement("$prefix:$tagname");
		} elseif ($this instanceof \DOMElement) {
			$xsl = $this->ownerDocument->createElement("$prefix:$tagname");
		}
		return $xsl;
	}
}
