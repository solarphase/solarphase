<?php namespace SolarPhase\Traits;

trait LocalizedModel {

	protected $l18n_base_id = '';

	/**
	 * Returns the singular localized name of the model.
	 *
	 * @return string
	 */
	public function singularName()
	{
		return trans_choice($l18n_base_id, 1);
	}

	/**
	 * Returns the plural localized name of the model.
	 *
	 * @return string
	 */
	public function pluralName()
	{
		return trans_choice($l18n_base_id, 2);
	}

	/**
	 * Returns the localized name of the specified attribute.
	 *
	 * @param string $attribute
	 * @return string
	 */
	public function trans($attribute)
	{
		return trans("{$l18n_base_id}_{$attribute}");
	}

	/**
	 * Returns the localized name of the specified attribute with the given
	 * choice parameter.
	 *
	 * @param string $attribute
	 * @param int $c
	 * @return string
	 */
	public function transChoice($attribute, $c)
	{
		return trans_choice("{$l18n_base_id}_{$attribute}", $c);
	}

}
