<?php namespace SolarPhase;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

use SolarPhase\Traits\LocalizedModel;
use SolarPhase\Traits\Administratable;

class User extends Model implements AuthenticatableContract {

	use Authenticatable, SoftDeletes, LocalizedModel, Administratable;

	/**
	 * The localization base identifier of the model.
	 *
	 * @var string
	 */
	protected static $l18n_base_id = 'model.users';

	/**
	 * The admin route name of the model.
	 *
	 * @var string
	 */
	protected static $admin_route = 'admin.user';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * Returns the articles that have been published by the user.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function articles()
	{
		return $this->hasMany('SolarPhase\Blog\Article');
	}

}
