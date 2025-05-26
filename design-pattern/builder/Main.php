<?php

namespace App\Builder;

require_once __DIR__ . '/../bootstrap.php';
class Main
{
	public function index(): void {
		$builder = new DefaultUserConfigBuilder();
		$config = $builder
			->setTheme('dark')
			->enableNotifications(false)
			->setTimeout(600)
			->build();
		echo $config;
	}
}

$main = new Main();
$main->index();