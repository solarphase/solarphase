<?php namespace SolarPhase\Website;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use SolarPhase\Traits\LocalizedModel;

class Link extends Model {

	use SoftDeletes, LocalizedModel;

	/**
	 * The localization base identifier of the model.
	 *
	 * @var string
	 */
	protected $l18n_base_id = 'model.website_links';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
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
	 * Returns the children links.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function page()
	{
		return $this->hasOne('SolarPhase\Website\Page');
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

	/**
	 * Getter for the uri attribute.
	 *
	 * @return string
	 */
	public function getUriAttribute()
	{
		if ($this->page)
		{
			return $this->page->uri;
		}
		
		return $this->uri;
	}

}
