<?php namespace SolarPhase\Http\Controllers;

use SolarPhase\Http\Requests;
use SolarPhase\Http\Controllers\Controller;
use SolarPhase\Blog\Category;

use Illuminate\Http\Request;

class BlogController extends Controller {

	public function category($id)
	{
		$category = Category::with('link')->findOrFail($id);
		$articles = $category->articles()->paginate(1);
		if ($category->link)
		{
			$this->setActiveLink($category->link);
		}

		return view('blog.category')->withModel($category)
			->withArticles($articles);
	}

}
