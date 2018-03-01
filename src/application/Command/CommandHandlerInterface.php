<?php
//port
interface CommandHandlerInterface
{
	public function Handle(CommandInterface $command);
}