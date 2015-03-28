<?php namespace SolarPhase\Website;

use Illuminate\Database\Eloquent\Model;

use SolarPhase\Traits\LocalizedModel;

class Link extends Model {

	use LocalizedModel;

	/**
	 * The localization base identifier of the model.
	 *
	 * @var string
	 */
	protected $l18n_base_id = 'model.website_links';

	/**
	 * A whitelist of all mass-assignable attributes.
	 */
	protected $fillable = ['title', 'uri', 'order', 'enabled'];

	/**
	 * Returns the parent link.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function parent()
	{
		return $this->belongsTo('SolarPhase\Website\Link');
	}

	/**
	 * Returns the children links.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function children()
	{
		return $this->hasMany('SolarPhase\Website\Link', 'parent_id');
	}

	/**
	 * Limits the result set to only parent links.
	 *
	 * @param mixed $query
	 * @return Illuminate\Database\Eloquent\Builder
	 */
	public function scopeOnlyParents($query)
	{
		return $query->where('parent_id', null);
	}

	/**
	 * Limits the result set to only child links.
	 *
	 * @param mixed $query
	 * @return Illuminate\Database\Eloquent\Builder
	 */
	public function scopeOnlyChildren($query)
	{
		return $query->whereNotNull('parent_id');
	}

}
