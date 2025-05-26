<?php

namespace App\Decorator;

require_once __DIR__ . '/../bootstrap.php';
class Main
{
	public function index(): void {
		$storage = new BasicFileStorage();
		$loggedStorage = new LoggedFileStorage($storage);
		$loggedStorage->save('loggable.log', 'This is a loggable message');
		echo $loggedStorage->read('loggable.log');

		$securedStorage = new EncryptedFileStorage($loggedStorage);
		$securedStorage->save('secured.log', 'This is a secure message');
		echo $securedStorage->read('secured.log');
	}
}

$main = new Main();
$main->index();