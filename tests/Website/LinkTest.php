<?php

class LinkTest extends TestCase {

	/**
	 * Test the uri attribute getter to make sure it primarily returns the
	 * associated page URI if present.
	 */
	public function testGetUriAttributeFetchesPageUriPrimarily()
	{
		$link = new SolarPhase\Website\Link;
		$link->uri = '/test';
		$link->page = new SolarPhase\Website\Page;
		$link->page->uri = '/test';

		$this->assertEquals('/test', $link->uri);
	}

	/**
	 * Test the uri attribute getter to make sure it returns its own URI if no
	 * other sources are present.
	 */
	public function testGetUriAttributeReturnsLinkUri()
	{
		$link = new SolarPhase\Website\Link;
		$link->uri = '/test';

		$this->assertEquals('/test', $link->uri);
	}

}
