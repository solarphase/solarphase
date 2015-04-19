<?php namespace SolarPhase\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use SolarPhase\Traits\LocalizedModel;
use SolarPhase\Traits\Administratable;

class Category extends Model {

	use SoftDeletes, LocalizedModel, Administratable;

	/**
	 * The localization base identifier of the model.
	 *
	 * @var string
	 */
	protected static $l18n_base_id = 'model.blog_categories';

	/**
	 * The admin route name of the model.
	 *
	 * @var string
	 */
	protected static $admin_route = 'admin.blog.category';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'master', 'enabled'];

	/**
	 * Returns the category's link.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function link()
	{
		return $this->belongsTo('SolarPhase\Website\Link');
	}

	/**
	 * Returns the articles that belong to the category.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function articles()
	{
		return $this->hasMany('SolarPhase\Blog\Article');
	}

	/**
	 * Returns the articles that should be shown to a visitor.
	 *
	 * @return mixed
	 */
	public function getArticles()
	{
		return $this->master
			? Article::published()->orderBy('published_at', 'desc')
			: $this->articles()->published()->orderBy('published_at', 'desc');
	}

	/**
	 * Returns the URI where the category resides.
	 *
	 * @return string
	 */
	public function getUri()
	{
		return \URL::route('blog.category', ['id' => $this->id]);
	}

}
