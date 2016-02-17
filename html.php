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
use \shgysk8zer0\Core_API as API;

/**
 *
 */
class HTML extends Abstracts\HTMLDocument implements Interfaces\DOMDocument, Interfaces\HTMLDocument
{
use API\Traits\GetIstance;
	public $head;
	public $body;
	public function __construct($doctype = self::DEFAULT_DOCTYPE, $encoding = self::ENCODING)
	{
		$this->_createDocument($doctype, $encoding);
		$this->registerNodeClass('\\DOMElement', '\\' . __NAMESPACE__ . '\\' . 'HTMLElement');
		$this->appendChild($this->createElement('html'));
		$this->head = $this->createElement('head');
		$this->body = $this->createElement('body');
		$this->documentElement->appendChild($this->head);
		$this->documentElement->appendChild($this->body);
		$this->head->appendChild($this->createElement('meta'))->charset(strtolower($encoding));
	}
}
