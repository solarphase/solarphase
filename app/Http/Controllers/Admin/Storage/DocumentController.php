<?php namespace SolarPhase\Http\Controllers\Admin\Storage;

use SolarPhase\Http\Requests;
use SolarPhase\Http\Controllers\Admin\Controller;
use SolarPhase\Storage\Document;

use Illuminate\Http\Request;

class DocumentController extends Controller {

	public function __construct()
	{
		parent::__construct();

		view()->share('route', 'admin.storage.document');
		view()->share('model_class', 'SolarPhase\Storage\Document');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.storage.document.index')
			->withModels(Document::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.storage.document.form')
			->withModel(new Document);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$document = new Document;
		$document->title = $request->input('title');
		$document->content = $request->input('content');
		$document->public = $request->input('public') === 'yes';
		$success = $document->save();

		$this->resultMessage('created', $document, $success);
		return redirect()->route('admin.storage.document.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('admin.storage.document.show')
			->withModel(Document::findOrFail($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.storage.document.form')
			->withModel(Document::findOrFail($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$document = Document::findOrFail($id);
		$document->title = $request->input('title');
		$document->content = $request->input('content');
		$document->public = $request->input('public') === 'yes';
		$success = $document->save();

		$this->resultMessage('saved', $document, $success);
		return redirect()->route('admin.storage.document.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$document = Document::findOrFail($id);
		$this->resultMessage('deleted', $document, $document->delete());

		return redirect()->route('admin.storage.document.index');
	}

}
