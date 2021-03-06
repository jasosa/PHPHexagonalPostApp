 <?php

include(dirname(__FILE__)  . "/../../application/Command/CommandBusInterface.php");

class SynchronousCommandBus implements CommandBusInterface
{
	/* @var CommandHandlerInterface[] */
	private $handlers = [];

	public function execute(CommandInterface $command)
	{
		$commandName = get_class($command);

		if (!array_key_exists($commandName, $this->handlers)) {
            throw new Exception("{$commandName} is not supported by the SynchronousCommandBus.");
        }

        return $this->handlers[$commandName]->handle($command);
	}

	public function register($commandName, CommandHandlerInterface $command)
    {
        $this->handlers[$commandName] = $command;

        return $this;
    }
}


