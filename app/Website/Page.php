<?php namespace SolarPhase\Website;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use SolarPhase\Traits\LocalizedModel;
use SolarPhase\Traits\MarkdownContent;

class Page extends Model {

	use SoftDeletes, LocalizedModel, MarkdownContent;

	/**
	 * The localization base identifier of the model.
	 *
	 * @var string
	 */
	protected static $l18n_base_id = 'model.website_pages';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'uri', 'content'];

	/**
	 * Returns the link of the page.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function link()
	{
		return $this->belongsTo('SolarPhase\Website\Link');
	}

}
