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

/**
 * \DOMDocument trait to set, check, remove attributes from documentElement
 */
trait DocumentElementAttributes
{
	/**
	 * Adds new attribute
	 *
	 * @param string  $name  The name of the attribute.
	 * @param mixed   $value The value of the attribute.
	 * @return void
	 * @see https://secure.php.net/manual/en/domelement.setattribute.php
	 * @example $this->class = 'classname'
	 */
	final public function __set($name, $value)
	{
		$this->documentElement->setAttribute($name, $value);
	}

	/**
	 * Returns value of attribute
	 *
	 * @param  string $name The name of the attribute.
	 * @return string       The value of the attribute, or an empty string
	 * @see https://secure.php.net/manual/en/domelement.getattribute.php
	 * @example echo $this->glass // Echoes 'classname'
	 */
	final public function __get($name)
	{
		return $this->documentElement->getAttribute($name);
	}

	/**
	 * Checks to see if attribute exists
	 *
	 * @param  string $name The attribute name.
	 * @return bool         TRUE on success or FALSE on failure.
	 * @see https://secure.php.net/manual/en/domelement.hasattribute.php
	 * @example isset($element->class)
	 */
	final public function __isset($name)
	{
		return $this->documentElement->hasAttribute($name);
	}

	/**
	 * Removes attribute
	 *
	 * @param string $name The name of the attribute.
	 * @return void
	 * @see https://secure.php.net/manual/en/domelement.removeattribute.php
	 * @example unset($element->class)
	 */
	final public function __unset($name)
	{
		return $this->documentElement->removeAttribute($name);
	}
}
