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
		return $this->getAdminUrl('index');
	}

	/**
	 * Returns the URL to the edit action of the corresponding administration
	 * controller.
	 *
	 * @return string
	 */
	public function getAdminEditUrl()
	{
		return $this->getAdminUrl('edit', $this->id);
	}

	/**
	 * Returns the URL to the show action of the corresponding administration
	 * controller.
	 *
	 * @return string
	 */
	public function getAdminShowUrl()
	{
		return $this->getAdminUrl('show');
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
		// TODO: Remove when blog admin is implemented:
		if ($this instanceof \SolarPhase\Blog\Category)
		{
			return '';
		}

		return \URL::route($this->getAdminRouteName($action), $id);
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
