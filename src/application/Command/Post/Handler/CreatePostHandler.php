//Adapter. Concrete implementation of the CommandHandlerInterface that wraps around another port (repository interface)

class CreatePostHandler implements CommandHandlerInterface
{
	private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function handle(CommandInterface $command)
    {
        if (!$command instanceof CreatePostCommand) {
            throw new Exception("CreatePostHandler can only handle CreatePostCommand");
        }

        $post = new Post;
        $post->id = uniqid();
        $post->title = $command->getTitle();
        $post->contents = $command->getContents();

        $this->postRepository->create($post);
    }
}