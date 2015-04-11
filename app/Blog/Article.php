<?php namespace SolarPhase\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use SolarPhase\Traits\LocalizedModel;
use SolarPhase\Traits\MarkdownContent;
use SolarPhase\Traits\Administratable;

class Article extends Model {

	use SoftDeletes, LocalizedModel, MarkdownContent, Administratable;

	/**
	 * The localization base identifier of the model.
	 *
	 * @var string
	 */
	protected static $l18n_base_id = 'model.blog_articles';

	/**
	 * The admin route name of the model.
	 *
	 * @var string
	 */
	protected static $admin_route = 'admin.blog.article';

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
	 * Returns a relation to all articles that have been published within the
	 * current context.
	 *
	 * @param mixed $query
	 * @return mixed
	 */
	public function scopePublished($query)
	{
		return $query->whereNotNull('published_at');
	}

	/**
	 * Returns the user that published the article.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function published_by()
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
