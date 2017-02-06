<?php
/**
 * @author Chris Zuber <shgysk8zer0@gmail.com>
 * @package shgysk8zer0\DOM
 * @version 0.0.1
 * @since 0.0.1
 * @copyright 2017, Chris Zuber
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
 * Class extending XML for generating RSS 2.0 feeds
 * @see https://www.tutorialspoint.com/rss/rss2.0-tag-syntax.htm
 */
final class RSS extends XML
{
	/**
	 *  Content-Type: `header("Content-Type: {$rss::CONTENT_TYPE}");`
	 * @var string
	 */
	const CONTENT_TYPE = 'application/rss+xml';

	/**
	 * RSS version for document
	 * @var string
	 */
	const VERSION      = '2.0';

	/**
	 * Default language
	 * @var string
	 */
	const LANGUAGE     = 'en-us';

	// @todo filter RSS item description / content using `strip_tags`
	const ALLOWED_TAGS = [
		'generic'     => ['div', 'span', 'p', 'data', 'abbr', 'dfn', 'bdi', 'bdo', 'address',],
		'headers'     => ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
		'whitespace'  => ['br', 'hr', 'br/', 'hr/', 'wbr',],
		'formatting'  => ['pre', 'code', 'samp', 'kbd', 'var', 'b', 'em', 'q', 'i', 'u', 's', 'small', 'strong', 'sub', 'del', 'ins', 'blockquote'],
		'lists'       => ['ol', 'ul', 'li', 'dl', 'dd', 'dt'],
		'table'       => ['table', 'td', 'th', 'tr', 'thead', 'tbody', 'tfoot', 'caption', 'col', 'colgroup',],
		'media'       => ['picture', 'source', 'img', 'figure', 'figcaption', 'audio', 'video'],
		'embed'       => ['embed', 'object', 'param', 'source',],
		'forms'       => ['form', 'fieldset', 'label', 'legend', 'input', 'select', 'optgroup', 'textarea', 'button', 'datalist', 'meter', 'output', 'progress',],
		'interactive' => ['button', 'details', 'dialog', 'summary', 'menu', 'menuitem',],
		'html5'       => ['header', 'hgroup', 'footer', 'section', 'mark', 'time',],
	];

	/**
	 * Base URL for all following URLs
	 * @var string
	 */
	private $url = '';

	/**
	 * Creates a new RSS document and sets channel / feed info
	 * @param String    $title       Feed title
	 * @param String    $link        Link to home page
	 * @param String    $description Description of feed
	 * @param String    $category    Category of feed
	 * @param \stdClass $image       Channel image {url: String[, width: Int[, height: Int;[, description: String]]]}
	 * @param String    $editor      Email address for person responsible for editorial content.
	 * @param String    $webmaster   Email address for person responsible for technical issues relating to channel.
	 * @param String    $lang        The language of your channel
	 * @param String    $copyright   Copyright identifier
	 */
	public function __construct(
		String    $title,
		String    $description = null,
		String    $category    = null,
		\stdClass $image       = null,
		String    $link        = null,
		String    $editor      = null,
		String    $webmaster   = null,
		String    $lang        = self::LANGUAGE,
		String    $copyright   = null
	)
	{
		if (is_null($link)) {
			$link = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/";
		} elseif (!filter_var($link, FILTER_VALIDATE_URL)) {
			throw new \InvalidArgumentException("$link is not a valid URL.");
		}
		$this->url = rtrim($link, '/');
		if (is_null($webmaster)) {
			$webmaster = $_SERVER['SERVER_ADMIN'];
		}
		parent::__construct('rss');
		$this->formatOutput = true;
		$this->preserveWhitespace = true;
		// $this->appendChild($this->createElement('rss'));
		$this->documentElement->version = $this::VERSION;
		$channel = $this->documentElement->append('channel');
		$channel->append('title', $title);
		$channel->append('link', $link);
		$channel->append('language', $lang);
		$channel->append('lastBuildDate', date(DATE_RSS));
		$channel->append('generator', __CLASS__);

		if (isset($description)) {
			$channel->append('description', $description);
		}
		if (isset($category)) {
			$channel->append('category', $category);
		}
		if (isset($copyright)) {
			$channel->append('copyright', $copyright);
		}
		if (isset($image, $image->url) and filter_var("$this->url/{$image->url}", FILTER_VALIDATE_URL, [
				'flags'  => FILTER_FLAG_PATH_REQUIRED,
			])) {
			$img = $channel->append('image');
			$img->appendC('url', "$this->url/{$image->url}");
			if (isset($image->width) and filter_var($image->width, FILTER_VALIDATE_INT)){
				$img->append('width', $image->width);
			}
			if (isset($image->height) and filter_var($image->height, FILTER_VALIDATE_INT)) {
				$img->append('height', $image->height);
			}
			if (isset($image->description)) {
				$img->append('description', $image->description);
			}
		}
	}

	/**
	 * Add an item / post to the feed items
	 * @param  stdClass $item The item to add
	 * @return Bool           Whether to not it was successfully added
	 */
	public function addItem(\stdClass $item): Bool
	{
		if (
			isset($item->title, $item->catURL, $item->url, $item->posted)
			and filter_var("{$this->url}/{$item->catURL}/{$item->url}", FILTER_VALIDATE_URL, [
				'flags'  => FILTER_FLAG_PATH_REQUIRED,
			]) and $item->posted instanceof \DateTime
		) {
			$added = $this->documentElement->append('item');
			$added->append('title', "$item->title");
			$added->append('link', "{$this->url}/{$item->catURL}/{$item->url}");
			$added->append('guid',"{$this->url}/{$item->catURL}/{$item->url}");
			$added->append('pubDate', $item->posted->format(\DateTime::RSS));

			if (isset($item->author) and filter_var($item->author, FILTER_VALIDATE_EMAIL)) {
				$added->append('author', $item->author);
			}
			if (@is_string($item->category)) {
				$added->append('category', $item->category);
			}
			if (@is_string($item->description) or @is_string($item->content)) {
				$added->append('description', $item->description ?? $item->content);
			}
			if (
				isset($item->media, $item->media->url, $item->media->size, $item->media->type)
				and filter_var($item->media->url, FILTER_VALIDATE_URL, [
					'flags' => FILTER_FLAG_PATH_REQUIRED,
				]) and filter_var($this->media->size, FILTER_VALIDATE_INT)
			) {
				$added->append('enclosure', null, [
					'url'    => $item->media->url,
					'length' => $item->media->size,
					'type'   => $item->media->type,
				]);
			}
			return true;
		} else {
			return false;
		}
	}
}
