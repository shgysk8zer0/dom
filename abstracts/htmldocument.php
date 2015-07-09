<?php
/**
 * @author Chris Zuber <shgysk8zer0@gmail.com>
 * @package shgysk8zer0\PHP_DOM
 * @subpackage Abstracts
 * @version 1.0.0
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
namespace shgysk8zer0\PHP_DOM\Abstracts;
use \shgysk8zer0\PHP_DOM as DOM;
use \shgysk8zer0\Core_API as API;

/**
 *
 */
abstract class HTMLDocument extends \DOMDocument
{
	use DOM\Traits\HTMLString;
	use DOM\Traits\XPath;

	const DEFAULT_DOCTYPE       = 'HTML5';

	/*DOMDocument arguments*/
	const VERSION               = '1.0';
	const ENCODING              = 'UTF-8';

	protected function _createDocument(
		$doctype  = self::DEFAULT_DOCTYPE,
		$encoding = self::ENCODING,
		$version  = self::VERSION
	)
	{
		$doctype = strtoupper($doctype);
		parent::__construct($version, $encoding);
		$this->loadHTML(constant("\\" . __NAMESPACE__ . "\\Doctype::{$doctype}"));
	}
}
