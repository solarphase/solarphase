<?php namespace SolarPhase\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use SolarPhase\Traits\LocalizedModel;

class Article extends Model {

	use Authenticatable, SoftDeletes, LocalizedModel;

	/**
	 * The localization base identifier of the model.
	 *
	 * @var string
	 */
	protected $l18n_base_id = 'model.blog_articles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'content', 'published_at'];

	/**
	 * The attributes that are dates.
	 *
	 * @var array
	 */
	protected $dates = ['published_at'];

	/**
	 * Returns the user that published the article.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function publishedBy()
	{
		return $this->belongsTo('SolarPhase\User', 'user_id');
	}

	/**
	 * Returns the category that the article belongs to.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category()
	{
		return $this->belongsTo('SolarPhase\Blog\Category');
	}

}
