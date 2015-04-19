<?php namespace SolarPhase\Traits;

trait MarkdownContent {

	/**
	 * Converts the content attribute to its HTML equivalent.
	 *
	 * @return string
	 */
	public function toHtml()
	{
		return \Markdown::convertToHtml($this->content);
	}

}
