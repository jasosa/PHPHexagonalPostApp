 <?php

include(dirname(__FILE__) . "/infrastructure/CommandBus/SynchronousCommandBus.php");
include(dirname(__FILE__) . "/infrastructure/Persistence/PostRepository.php");
include(dirname(__FILE__) . "/application/Command/Post/Handler/CreatePostHandler.php");
include(dirname(__FILE__) . "/application/Command/Post/CreatePostCommand.php");

$commandBus = new SynchronousCommandBus();

$postRepository = new PostRepository;
$commandHandler = new CreatePostHandler($postRepository);

$commandBus->register(CreatePostCommand::class, $commandHandler);

$command = new CreatePostCommand(
    "This is the post title", 
    "And this is the content"
);

$commandBus->execute($command);

?>