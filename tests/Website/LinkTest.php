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
		$link->page->uri = '/test2';

		$this->assertEquals('/test2', $link->uri);
	}

	/**
	 * Test the uri attribute getter to make sure it secondarily returns the
	 * associated category URI if present.
	 */
	public function testGetUriAttributesFetchesCategoryUriSecondarily()
	{
		$link = new SolarPhase\Website\Link;
		$link->uri = '/test';
		$link->category = new SolarPhase\Blog\Category;
		$link->category->id = 5;

		$this->assertEquals(URL::route('blog.category', ['id' => 5]), $link->uri);
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

	/**
	 * Tests both the "only parents" and the "only children" scopes.
	 */
	public function testOnlyScopes()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		SolarPhase\Website\Link::truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$l1 = SolarPhase\Website\Link::create(['title' => 'test 1']);
		$l2 = SolarPhase\Website\Link::create(['title' => 'test 2']);
		$l2->parent()->associate($l1);
		$l2->save();

		$parents = SolarPhase\Website\Link::onlyParents()->get();
		$this->assertCount(1, $parents);
		$this->assertEquals('test 1', $parents[0]->title);

		$children = SolarPhase\Website\Link::onlyChildren()->get();
		$this->assertCount(1, $children);
		$this->assertEquals('test 2', $children[0]->title);
	}

}
