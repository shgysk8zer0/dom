<?php
/**
 * @author Chris Zuber <shgysk8zer0@gmail.com>
 * @package shgysk8zer0\DOM
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
namespace shgysk8zer0\DOM;

/**
 * Class for creating XSL stylesheets/templates
 */
class XSLStylesheet extends Abstracts\XMLNS
{
	const VERSION      = '1.0';
	const ENCODING     = 'UTF-8';
	const CONTENT_TYPE = 'application/xslt+xml';

	use Traits\XMLString;
	use Traits\XSL;

	/**
	 * Creates a new \DOMDocument and appends a new `<?xsl-stylesheet?>`
	 *
	 * @param string $version  The version of the XML document
	 * @param string $encoding The encoding/charset of the document
	 */
	public function __construct($version = self::VERSION, $encoding = self::ENCODING)
	{
		parent::__construct($version, $encoding);
		$this->registerNodeClass('\\DOMElement', '\\' . __NAMESPACE__ . '\\' . 'XMLElement');
		$xsl = $this->createXSLStyleSheet($version);
		$this->appendChild($xsl);
	}
}
