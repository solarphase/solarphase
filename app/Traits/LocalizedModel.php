<?php namespace SolarPhase\Traits;

trait LocalizedModel {

	/**
	 * Returns the localization identifier of the model.
	 *
	 * @return string
	 */
	protected function localizationIdentifier()
	{
		return 'model.'.$this->table;
	}

	/**
	 * Returns the singular localized name of the model.
	 *
	 * @return string
	 */
	public function singularName()
	{
		return trans_choice($this->localizationIdentifier(), 1);
	}

	/**
	 * Returns the plural localized name of the model.
	 *
	 * @return string
	 */
	public function pluralName()
	{
		return trans_choice($this->localizationIdentifier(), 2);
	}

	/**
	 * Returns the localized name of the specified attribute.
	 *
	 * @param string $attribute
	 * @return string
	 */
	public function trans($attribute)
	{
		return trans("{$this->localizationIdentifier()}_{$attribute}");
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
		return trans_choice("{$this->localizationIdentifier()}_{$attribute}", $c);
	}

}
