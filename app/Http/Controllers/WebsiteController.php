<?php namespace SolarPhase\Http\Controllers;

use SolarPhase\Http\Requests;
use SolarPhase\Http\Controllers\Controller;
use SolarPhase\Website\Page;

use Illuminate\Http\Request;

class WebsiteController extends Controller {

	/**
	 * Responds with the page that corresponds to the specified URI.
	 *
	 * @param string $uri
	 */
	public function page($uri = '/')
	{
		$uri = '/'.ltrim($uri, '/');
		$page = Page::with('link')->where('uri', $uri)->firstOrFail();

		$this->setTitle($page->title);
		$this->setActiveLink($page->link);
		return view('website.page', ['model' => $page]);
	}

}
