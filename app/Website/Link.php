<?php namespace SolarPhase\Website;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use SolarPhase\Traits\LocalizedModel;
use SolarPhase\Traits\Administratable;

class Link extends Model {

	use SoftDeletes, LocalizedModel, Administratable;

	/**
	 * The localization base identifier of the model.
	 *
	 * @var string
	 */
	protected static $l18n_base_id = 'model.website_links';

	/**
	 * The admin route name of the model.
	 *
	 * @var string
	 */
	protected static $admin_route = 'admin.website.link';

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
	 * Returns the associated page.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function page()
	{
		return $this->hasOne('SolarPhase\Website\Page');
	}

	/**
	 * Returns the associated blog category.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function category()
	{
		return $this->hasOne('SolarPhase\Blog\Category');
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
	 * Limits the result set to only links which have not been assigned.
	 *
	 * @param mixed $query
	 */
	public function scopeFree($query)
	{
		return $query->doesntHave('page')->doesntHave('category');
	}

	/**
	 * Getter for the uri attribute.
	 *
	 * @return string
	 */
	public function getUriAttribute($value)
	{
		$model = $this->getAssociatedModel();
		if ($model instanceof \SolarPhase\Website\Page)
		{
			return $model->uri;
		}
		else if ($model instanceof \SolarPhase\Blog\Category)
		{
			return $model->getUri();
		}
		
		return $value;
	}

	/**
	 * Returns the model that is associated with the link.
	 *
	 * @return mixed
	 */
	public function getAssociatedModel()
	{
		if ($this->page)
		{
			return $this->page;
		}
		else if ($this->category)
		{
			return $this->category;
		}

		return null;
	}

}
