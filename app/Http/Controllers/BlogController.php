<?php namespace SolarPhase\Http\Controllers;

use SolarPhase\Http\Requests;
use SolarPhase\Http\Controllers\Controller;
use SolarPhase\Blog\Article;
use SolarPhase\Blog\Category;

use Illuminate\Http\Request;

class BlogController extends Controller {

	public function category($id)
	{
		$category = Category::with('link')->findOrFail($id);
		$articles = $category->articles()->paginate(5);
		if ($category->link)
		{
			$this->setActiveLink($category->link);
		}

		return view('blog.category')->withModel($category)
			->withArticles($articles);
	}

	public function article($id)
	{
		$article = Article::with('category')->findOrFail($id);
		if ($article->category->link)
		{
			$this->setActiveLink($article->category->link);
		}

		return view('blog.article')->withModel($article);
	}

}
