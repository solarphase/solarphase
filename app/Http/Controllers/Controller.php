<?php namespace SolarPhase\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use SolarPhase\Website\Link;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	/**
	 * Creates a new controller instance.
	 */
	public function __construct()
	{
		view()->share('title', '');
		view()->share('active_links', []);
		view()->share(
			'navigation_links',
			Link::onlyParents()->with('children')->get()
		);
	}

	/**
	 * Sets the title for the request.
	 *
	 * @param string $title
	 */
	public function setTitle($title)
	{
		view()->share('title', $title);
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
		array_push($active_links, $link->id);
		if ($link->parent) {
			return $this->setActiveLink($link->parent, $active_links);
		}

		view()->share('active_links', $active_links);
	}

}
