<?php

include(dirname(__FILE__)  . "/../../../../src/application/Command/Post/CreatePostCommand.php");

use PHPUnit\Framework\TestCase;

class CreatePostCommandTest extends TestCase
{
	public function testItIsCreatedSuccesfully()
	{
		$commandUT = new CreatePostCommand(
    		"This is the post title", 
    		"And this is the content"
		);	

		$this->assertEquals("This is the post title",$commandUT->getTitle());
		$this->assertEquals("And this is the content", $commandUT->getContents());
	}
}
