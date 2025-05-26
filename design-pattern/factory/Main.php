<?php

namespace App\Factory;

require_once __DIR__ . '/../bootstrap.php';
class Main
{
	public function index(): void
	{
		// 使用不同的日志工厂创建日志
		$factory = new FileLoggerFactory();
		$logger = $factory->createLogger();
		$logger->log('Hello World');

		$factory2 = new DbLoggerFactory();
		$logger2 = $factory2->createLogger();
		$logger2->log('Hello World');
	}
}

$main =  new Main();
$main->index();