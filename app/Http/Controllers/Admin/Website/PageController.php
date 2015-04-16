<?php namespace SolarPhase\Http\Controllers\Admin\Website;

use SolarPhase\Http\Requests;
use SolarPhase\Http\Controllers\Admin\Controller;
use SolarPhase\Website\Page;
use SolarPhase\Website\Link;

use Illuminate\Http\Request;

class PageController extends Controller {

	public function __construct()
	{
		parent::__construct();

		$this->setTitle(trans_choice('model.website_pages', 2));
		view()->share('route', 'admin.website.page');
		view()->share('model_class', 'SolarPhase\Website\Page');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.website.page.index')
			->withModels(Page::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.website.page.form')
			->withModel(new Page)
			->withLinks($this->getLinkList());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$page = new Page;
		$this->fillModel($page, $request);

		$result = $page->save();
		$this->resultMessage('created', $page, $result);
		if (!$result)
		{
			return redirect()->route('admin.website.page.create');
		}

		return redirect()->route('admin.website.page.edit', $page->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('admin.website.page.show')
			->withModel(Page::findOrFail($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = Page::findOrFail($id);
		return view('admin.website.page.form')
			->withModel($page)
			->withLinks($this->getLinkList($page->link_id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$page = Page::findOrFail($id);
		$this->fillModel($page, $request);
		$this->resultMessage('saved', $page, $page->save());

		return redirect()->route('admin.website.page.edit', $page->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$page = Page::findOrFail($id);
		$this->resultMessage('deleted', $page, $page->delete());

		return redirect()->route('admin.website.page.index');
	}

	/**
	 * Fills the page model with the input values of the request.
	 *
	 * @param Page $model
	 * @param Request $request
	 */
	protected function fillModel(Page $model, Request $request)
	{
		$model->title = $request->input('title');
		$model->uri = $request->input('uri');
		$model->content = $request->input('content');

		$link_id = $request->input('link_id');
		if ($link_id)
		{
			$link = Link::findOrFail($link_id);
			$model->link()->associate($link);
		}
		else
		{
			$model->link_id = null;
		}
	}

	/**
	 * Returns an array of links that the page can be associated with in a list
	 * format that can be used in a HTML select box.
	 *
	 * @return array
	 */
	protected function getLinkList($id = null)
	{
		$links = Link::free();
		$links = $links->lists('title', 'id');
		if ($id != null)
		{
			$link = Link::findOrFail($id);
			$links = [$link->id => $link->title] + $links;
		}

		return ['' => ''] + $links;
	}

}
