<?php namespace SolarPhase\Http\Controllers\Admin;

use SolarPhase\Http\Controllers\Controller as BaseController;

abstract class Controller extends BaseController {

	/**
	 * Displays a result message for the performed operation.
	 *
	 * @param string $trans
	 * @param mixed $model
	 * @param bool $success
	 */
	public function resultMessage($trans, $model, $success)
	{
		$trans = $trans.($success ? '' : '_failed');
		$this->flashMessage(
			$success ? 'success' : 'danger',
			trans('admin.'.$trans, ['model' => $model->singularName()])
		);
	}

}
