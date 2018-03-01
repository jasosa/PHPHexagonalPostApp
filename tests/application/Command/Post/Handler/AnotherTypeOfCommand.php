<?php

include(dirname(__FILE__)  . "/../../../../../src/application/CommandInterface.php");

class AnotherTypeOfCommand implements CommandInterface
{
	public function __construct(){}
}

