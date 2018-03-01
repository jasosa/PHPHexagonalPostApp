class CreastePostCommand implements CommandInterface
{
	private $title;
	private $contents;

	public function __construct ($title, $contents)
	{
		$this->title = $title;
		$this->contents = $contents;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getContents()
	{
		return $this->contents;
	}
}