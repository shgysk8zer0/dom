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
namespace shgysk8zer0\PHP_DOM\Abstracts;

/**
 * A collection of namespace URIs as well as tag names
 */
abstract class XMLNS extends \DOMDocument
{
	const XSL_URI            = 'http://www.w3.org/1999/XSL/Transform';
	const XMLNS              = 'http://www.w3.org/2000/xmlns/';
	const XSLNS              = 'xmlns:xsl';
	const STYLESHEET_TAGNAME = 'xsl:stylesheet';
	const XSL_CONTENT_TYPE   = 'application/xslt+xml';
}
