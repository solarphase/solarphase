<?php namespace SolarPhase\Storage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use SolarPhase\Traits\LocalizedModel;

class File extends Model {

	use SoftDeletes, LocalizedModel;

	/**
	 * The localization base identifier of the model.
	 *
	 * @var string
	 */
	protected $l18n_base_id = 'model.storage_files';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'extension', 'mime_type', 'public'];

	/**
	 * Populates the attributes of the file based on the specified uploaded
	 * file instance.
	 *
	 * @param UploadedFile $file
	 */
	public function fromUploadedFile(UploadedFile $file)
	{
		$this->name = $file->getClientOriginalName();
		$this->extension = $file->guessExtension();
		$this->mime_type = $file->getMimeType();
	}

	/**
	 * Gets the unique file name for the file.
	 *
	 * @return string
	 */
	public function getFileName()
	{
		return "{$this->id}.{$this->extension}";
	}

}
