<?php namespace SolarPhase\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use SolarPhase\Website\Link;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	private $_title = '';
	private $_title_separator = ' | ';

	/**
	 * Creates a new controller instance.
	 */
	public function __construct()
	{
		view()->share('title', $this->_title);
		view()->share('active_links', []);
		view()->share(
			'navigation_links',
			Link::onlyParents()
				->orderBy('order', 'desc')
				->with('children')
				->get()
		);
	}

	/**
	 * Sets the title for the request.
	 *
	 * @param string $title
	 */
	public function setTitle($title)
	{
		view()->share('title', $this->_title = $title);
	}

	/**
	 * Prefixes the title for the request.
	 *
	 * @param string $prefix
	 */
	public function prefixTitle($prefix)
	{
		$prefix = $prefix.$this->_title_separator;
		view()->share('title', $this->_title = ($prefix.$this->_title));
	}

	/**
	 * Suffixes the title for the request.
	 *
	 * @param string $suffix
	 */
	public function suffixTitle($suffix)
	{
		$suffix = $this->_title_separator.$suffix;
		view()->share('title', $this->_title = ($this->_title.$suffix));
	}

	/**
	 * Traverses the specified link and populates the active link stack with the
	 * appropriate link ids.
	 *
	 * @param Link $link
	 * @param array $active_links
	 */
	public function setActiveLink(Link $link, $active_links = [])
	{
		if (empty($active_links))
		{
			$this->setTitle($link->title);
		}
		else
		{
			$this->suffixTitle($link->title);
		}

		array_push($active_links, $link->id);
		if ($link->parent)
		{
			return $this->setActiveLink($link->parent, $active_links);
		}

		view()->share('active_links', $active_links);
	}

	/**
	 * Puts a message in the flash session to be displayed on the next request.
	 *
	 * @param string $type
	 * @param string $text
	 */
	public function flashMessage($type, $text)
	{
		session()->flash('message', [
			'type' => $type,
			'text' => $text,
		]);
	}

}
