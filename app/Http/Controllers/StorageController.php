<?php namespace SolarPhase\Http\Controllers;

use SolarPhase\Http\Requests;
use SolarPhase\Http\Controllers\Controller;
use SolarPhase\Storage\File;
use SolarPhase\Storage\Document;

use Illuminate\Http\Request;

class StorageController extends Controller {

	/**
	 * Returns a download for the specified file if the file is public or if the
	 * user is authenticated.
	 *
	 * @param mixed $id
	 */
	public function file($id)
	{
		$file = File::findOrFail($id);
		$path = storage_path().'/files/'.$file->getFileName();
		if (!$file->public && !\Auth::check())
		{
			return redirect('/user/login');
		}

		return response()->download($path, $file->name);
	}

	/**
	 * Displays the requested document if it is public or if the user is
	 * authenticated.
	 *
	 * @param mixed $id
	 */
	public function document($id)
	{
		$document = Document::findOrFail($id);
		if (!$document->public && !\Auth::check())
		{
			return redirect('/user/login');
		}

		return view('storage.document', ['model' => $document]);
	}

}
