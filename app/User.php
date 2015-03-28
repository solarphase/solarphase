<?php namespace SolarPhase;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

use SolarPhase\Traits\LocalizedModel;

class User extends Model implements AuthenticatableContract {

	use Authenticatable, SoftDeletes, LocalizedModel;

	/**
	 * The localization base identifier of the model.
	 *
	 * @var string
	 */
	protected $l18n_base_id = 'model.users';

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

}
