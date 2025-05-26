<?php

namespace App\Factory;

abstract class LoggerFactory
{
	abstract public function createLogger(): Logger;
}