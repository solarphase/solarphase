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

}
