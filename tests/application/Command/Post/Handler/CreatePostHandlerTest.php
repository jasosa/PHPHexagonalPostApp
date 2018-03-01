<?php

include(dirname(__FILE__) . "/../../../../../src/application/Command/Post/Handler/CreatePostHandler.php");
include(dirname(__FILE__) . "/../../../../../src/infrastructure/Persistence/PostRepository.php");
include(dirname(__FILE__) . "/AnotherTypeOfCommand.php");

use PHPUnit\Framework\TestCase;

class CreatePostHandletTest extends TestCase
{
	public function testPostIsCreatedSuccesfully()
	{
		//Arrange
		//I´m not creating a mock of PostRepository and CreatePostCommand dependencies intentionally.
		$postRepository = new PostRepository();
		$command = new CreatePostCommand(
    		"This is the post title", 
    		"And this is the content"
		);

		$handlerUT = new CreatePostHandler($postRepository);		

		//Act
		$handlerUT->handle($command);

		//Assert
		$this->assertEquals(1,count($postRepository->getPosts()));
		$this->assertEquals("This is the post title", $postRepository->getPosts()[0]->title);
		$this->assertEquals("And this is the content", $postRepository->getPosts()[0]->contents);
	}

	/**
     * @expectedException        Exception
     * @expectedExceptionMessage CreatePostHandler can only handle CreatePostCommand
     */	
	public function testExceptionWhenIsNotRightTypeOfCommand()
	{
		//Arrange
		$postRepository = new PostRepository();
		$command = new AnotherTypeOfCommand();

		$handlerUT = new CreatePostHandler($postRepository);

		//Act
		$handlerUT->handle($command);
	}
}