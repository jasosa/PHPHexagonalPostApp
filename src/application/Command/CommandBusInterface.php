interface CommandBusInterface
{
	public function execute(CommandInterface $command);
}