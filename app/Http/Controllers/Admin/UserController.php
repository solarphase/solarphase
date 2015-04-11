<?php namespace SolarPhase\Http\Controllers\Admin;

use SolarPhase\Http\Requests;
use SolarPhase\Http\Controllers\Admin\Controller;
use SolarPhase\User;

use Illuminate\Http\Request;

class UserController extends Controller {

	public function __construct()
	{
		parent::__construct();

		$this->setTitle(trans_choice('model.users', 2));
		view()->share('route', 'admin.user');
		view()->share('model_class', 'SolarPhase\User');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.user.index')
			->withModels(User::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.user.form')
			->withModel(new User);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user = new User;
		$this->fillModel($request, $user);
		$this->resultMessage('created', $user, $user->save());

		return redirect()->route('admin.user.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return null;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.user.form')
			->withModel(User::findOrFail($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$user = User::findOrFail($id);
		$this->fillModel($request, $user);
		$this->resultMessage('saved', $user, $user->save());

		return redirect()->route('admin.user.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);

		// If the authenticated user is trying to delete himself.
		if (\Auth::user()->id == $id)
		{
			$this->resultMessage('deleted', $user, false);
		}
		else
		{
			$this->resultMessage('deleted', $user, $user->delete());
		}

		return redirect()->route('admin.user.index');
	}

	/**
	 * Fills the user model with the input values of the request.
	 *
	 * @param Request $request
	 * @param User $model
	 */
	protected function fillModel(Request $request, User $model)
	{
		$model->name = $request->input('name');
		$model->email = $request->input('email');
		if ($request->input('password'))
		{
			$model->password = bcrypt($request->input('password'));
		}
	}

}
