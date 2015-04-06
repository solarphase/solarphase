<?php namespace SolarPhase\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use SolarPhase\Traits\LocalizedModel;

class Category extends Model {

	use SoftDeletes, LocalizedModel;

	/**
	 * The localization base identifier of the model.
	 *
	 * @var string
	 */
	protected $l18n_base_id = 'model.blog_categories';

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
		if ($this->master)
		{
			return Article::with('category');
		}

		return $this->hasMany('SolarPhase\Blog\Article');
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
