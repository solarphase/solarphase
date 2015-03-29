<?php

use SolarPhase\Storage\Document;

class DocumentTest extends TestCase {

	/**
	 * Tests the toHtml method which takes the content attribute of the document
	 * and converts it into HTML.
	 */
	public function testToHtml()
	{
		$document = new Document;
		$document->content = '# Hello World';

		$this->assertEquals(Markdown::convertToHtml($document->content), $document->toHtml());
	}

}
