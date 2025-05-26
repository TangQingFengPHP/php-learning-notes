<?php

namespace App\Adapter;

require_once __DIR__ . '/../bootstrap.php';
class Main
{
	public function index(): void {
		$legacyLogger = new LegacyLogger();
		$adapter = new LegacyLoggerAdapter($legacyLogger);
		$adapter->log('ERROR', 'Database connection failed.');
	}
}

$main = new Main();
$main->index();