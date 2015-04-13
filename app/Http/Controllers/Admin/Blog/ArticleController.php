<?php namespace SolarPhase\Http\Controllers\Admin\Blog;

use SolarPhase\Http\Requests;
use SolarPhase\Http\Controllers\Admin\Controller;
use SolarPhase\Blog\Article;
use SolarPhase\Blog\Category;

use Illuminate\Http\Request;

class ArticleController extends Controller {

	public function __construct()
	{
		parent::__construct();

		$this->setTitle(trans_choice('model.blog_articles', 2));
		view()->share('route', 'admin.blog.article');
		view()->share('model_class', 'SolarPhase\Blog\Article');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.blog.article.index')
			->withModels(Article::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.blog.article.form')
			->withModel(new Article)
			->withCategories($this->getCategoryList());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$article = new Article;
		$this->fillModel($article, $request);
		$this->resultMessage('created', $article, $article->save());

		return redirect()->route('admin.blog.article.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('admin.blog.article.show')
			->withModel(Article::findOrFail($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$article = Article::findOrFail($id);
		return view('admin.blog.article.form')
			->withModel($article)
			->withCategories($this->getCategoryList($article->category_id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$article = Article::findOrFail($id);
		$this->fillModel($article, $request);
		$this->resultMessage('saved', $article, $article->save());

		return redirect()->route('admin.blog.article.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = Article::findOrFail($id);
		$this->resultMessage('deleted', $article, $article->delete());

		return redirect()->route('admin.blog.article.index');
	}

	/**
	 * Fills the article model with the input values of the request.
	 *
	 * @param Article $model
	 * @param Request $request
	 */
	public function fillModel(Article $model, Request $request)
	{
		$model->title = $request->input('title');
		$model->content = $request->input('content');
		$category = Category::findOrFail($request->input('category_id'));
		$model->category()->associate($category);

		$publish = $request->input('published') === 'yes';
		if ($model->published_at != null && !$publish)
		{
			$model->published_at = null;
			$model->user_id = null;
		}
		else if ($model->published_at == null && $publish)
		{
			$model->published_at = new \DateTime;
			$model->published_by()->associate(\Auth::user());
		}
	}

	/**
	 * Returns an array of categories that the article can be associated with in
	 * a list format that can be used in a HTML select box.
	 *
	 * @param int $id
	 * @return array
	 */
	public function getCategoryList($id = null)
	{
		return Category::lists('title', 'id');
	}

}
