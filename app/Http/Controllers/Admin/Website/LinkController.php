<?php namespace SolarPhase\Http\Controllers\Admin\Website;

use SolarPhase\Http\Requests;
use SolarPhase\Http\Controllers\Admin\Controller;
use SolarPhase\Website\Link;

use Illuminate\Http\Request;

class LinkController extends Controller {

	public function __construct()
	{
		parent::__construct();

		view()->share('route', 'admin.website.link');
		view()->share('model_class', 'SolarPhase\Website\Link');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.website.link.index')
			->withModels(Link::orderBy('order', 'desc')->get());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.website.link.form')
			->withModel(new Link)
			->withParents($this->getParentLinkList());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$link = new Link;
		$this->fillModel($link, $request);
		$this->resultMessage('created', $link, $link->save());

		return redirect()->route('admin.website.link.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return null;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.website.link.form')
			->withModel(Link::findOrFail($id))
			->withParents($this->getParentLinkList($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$link = Link::findOrFail($id);
		$this->fillModel($link, $request);
		$this->resultMessage('saved', $link, $link->save());

		return redirect()->route('admin.website.link.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$link = Link::findOrFail($id);
		$this->resultMessage('deleted', $link, $link->delete());

		return redirect()->route('admin.website.link.index');
	}

	/**
	 * Fills the link model with the input values of the request.
	 *
	 * @param Link $model
	 * @param Request $request
	 */
	protected function fillModel(Link $link, Request $request)
	{
		$link->title = $request->input('title');
		$link->uri = $request->input('uri');
		$link->order = $request->input('order');
		$link->enabled = $request->input('enabled') === 'yes';

		$parent_id = $request->input('parent_id');
		if ($parent_id)
		{
			$parent = Link::findOrFail($parent_id);
			$link->parent()->associate($parent);
		}
		else
		{
			$link->parent_id = null;
		}
	}

	/**
	 * Returns an array of parent links in a list format that can be used in a
	 * HTML select box.
	 *
	 * @return array
	 */
	protected function getParentLinkList($id = null)
	{
		$parents = Link::onlyParents();
		if ($id != null)
		{
			$parents = $parents->whereNotIn('id', [$id]);
		}

		$parents = ['' => ''] + $parents->lists('title', 'id');

		return $parents;
	}

}
