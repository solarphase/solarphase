<?php namespace SolarPhase\Storage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use SolarPhase\Traits\LocalizedModel;
use SolarPhase\Traits\MarkdownContent;
use SolarPhase\Traits\Administratable;

class Document extends Model {

	use SoftDeletes, LocalizedModel, MarkdownContent, Administratable;

	/**
	 * The localization base identifier of the model.
	 *
	 * @var string
	 */
	protected static $l18n_base_id = 'model.storage_documents';

	/**
	 * The admin route name of the model.
	 *
	 * @var string
	 */
	protected static $admin_route = 'admin.storage.document';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'content', 'public'];

	/**
	 * Returns the content of the document in its HTML equivalent.
	 *
	 * @return string
	 */
	public function toHtml()
	{
		return \Markdown::convertToHtml($this->content);
	}

}
