<?php

use Symfony\Component\HttpFoundation\File\UploadedFile;

use SolarPhase\Storage\File;

class FileTest extends TestCase {

	/**
	 * Tests the fromUpdatedFile method which automatically populates the
	 * model based on the passed file information.
	 */
	public function testFromUploadedFile()
	{
		file_put_contents('/tmp/test.txt', 'Hello World');

		$file = new File;
		$uploaded_file = new UploadedFile('/tmp/test.txt', 'test.txt');

		$file->fromUploadedFile($uploaded_file);
		$this->assertEquals($uploaded_file->getClientOriginalName(), $file->name);
		$this->assertEquals($uploaded_file->guessExtension(), $file->extension);
		$this->assertEquals($uploaded_file->getMimeType(), $file->mime_type);
	}

	/**
	 * Tests the getFileName method which returns the name of the file where the
	 * data is stored.
	 */
	public function testGetFileName()
	{
		$file = new File;
		$file->id = 555;
		$file->extension = 'txt';

		$this->assertEquals('555.txt', $file->getFileName());
	}

}
