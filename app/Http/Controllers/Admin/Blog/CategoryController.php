<?php namespace SolarPhase\Http\Controllers\Admin\Blog;

use SolarPhase\Http\Requests;
use SolarPhase\Http\Controllers\Admin\Controller;
use SolarPhase\Blog\Category;
use SolarPhase\Website\Link;

use Illuminate\Http\Request;

class CategoryController extends Controller {

	public function __construct()
	{
		parent::__construct();

		$this->setTitle(trans_choice('model.blog_categories', 2));
		view()->share('route', 'admin.blog.category');
		view()->share('model_class', 'SolarPhase\Blog\Category');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.blog.category.index')
			->withModels(Category::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.blog.category.form')
			->withModel(new Category)
			->withLinks($this->getLinkList());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$category = new Category;
		$this->fillModel($category, $request);
		$this->resultMessage('created', $category, $category->save());

		return redirect()->route('admin.blog.category.index');
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
		$category = Category::findOrFail($id);
		return view('admin.blog.category.form')
			->withModel($category)
			->withLinks($this->getLinkList($category->link_id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$category = Category::findOrFail($id);
		$this->fillModel($category, $request);
		$this->resultMessage('saved', $category, $category->save());

		return redirect()->route('admin.blog.category.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Category::findOrFail($id);
		$this->resultMessage('deleted', $category, $category->delete());

		return redirect()->route('admin.blog.category.index');
	}

	/**
	 * Fills the category model with the input values of the request.
	 *
	 * @param Category $model
	 * @param Request $request
	 */
	protected function fillModel(Category $model, Request $request)
	{
		$model->title = $request->input('title');
		$model->master = $request->input('master') === 'yes';
		$model->enabled = $request->input('enabled') === 'yes';

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
	 * Returns an array of links that the category can be associated with in a
	 * list format that can be used in a HTML select box.
	 *
	 * @param int $id
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
