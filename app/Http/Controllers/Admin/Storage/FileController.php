<?php namespace SolarPhase\Http\Controllers\Admin\Storage;

use SolarPhase\Http\Requests;
use SolarPhase\Http\Controllers\Admin\Controller;
use SolarPhase\Storage\File;

use Illuminate\Http\Request;

class FileController extends Controller {

	public function __construct()
	{
		parent::__construct();

		view()->share('file_upload', true);
		view()->share('route', 'admin.storage.file');
		view()->share('model_class', 'SolarPhase\Storage\File');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.storage.file.index')
			->withModels(File::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.storage.file.form')
			->withModel(new File);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$success = false;
		if ($request->hasFile('file'))
		{
			$uploaded_file = $request->file('file');

			$file = new File;
			$file->fromUploadedFile($uploaded_file);
			$file->public = $request->input('public') === 'yes';

			if ($success = $file->save())
			{
				$uploaded_file->move(File::getUploadPath(), $file->getFileName());
			}
		}

		$this->resultMessage('created', $file, $success);
		return redirect()->route('admin.storage.file.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$file = File::findOrFail($id);

		return response()->download(
				$file->getFilePath(),
				$file->name,
				['Content-Type' => $file->mime_type]
			);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.storage.file.form')
			->withModel(File::findOrFail($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$file = File::findOrFail($id);
		$file->public = $request->input('public') === 'yes';
		$this->resultMessage('saved', $file, $file->save());

		return redirect()->route('admin.storage.file.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$file = File::findOrFail($id);
		$this->resultMessage('deleted', $file, $file->delete());

		return redirect()->route('admin.storage.file.index');
	}

}
