<?php namespace SolarPhase\Traits;

trait Administratable {

	/**
	 * Returns the URL to the index action of the corresponding administration
	 * controller.
	 *
	 * @return string
	 */
	public function getAdminIndexUrl()
	{
		return self::getAdminUrl('index');
	}

	/**
	 * Returns the URL to the create action of the corresponding administration
	 * controller.
	 *
	 * @return string
	 */
	public function getAdminCreateUrl()
	{
		return self::getAdminUrl('create');
	}

	/**
	 * Returns the URL to the edit action of the corresponding administration
	 * controller.
	 *
	 * @return string
	 */
	public function getAdminEditUrl()
	{
		return self::getAdminUrl('edit', $this->id);
	}

	/**
	 * Returns the URL to the show action of the corresponding administration
	 * controller.
	 *
	 * @return string
	 */
	public function getAdminShowUrl()
	{
		return self::getAdminUrl('show', $this->id);
	}

	/**
	 * Returns the URL to the specified action of the corresponding
	 * administration controller.
	 *
	 * @param string $action
	 * @return string
	 */
	public function getAdminUrl($action, $id = null)
	{
		if ($id)
		{
			return \URL::route(self::getAdminRouteName($action), $id);
		}
		
		return \URL::route(self::getAdminRouteName($action));
	}

	/**
	 * Returns the full route name of the specified action.
	 *
	 * @param string $action
	 * @return string
	 */
	protected function getAdminRouteName($action)
	{
		return static::$admin_route.".{$action}";
	}

}
