<?php

use SolarPhase\Website\Page;

class PageTest extends TestCase {

	/**
	 * Tests the toHtml method which takes the content attribute of the page
	 * and converts it into HTML.
	 */
	public function testToHtml()
	{
		$page = new Page;
		$page->content = '# Hello World';

		$this->assertEquals(Markdown::convertToHtml($page->content), $page->toHtml());
	}

}
