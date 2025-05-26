<?php

namespace App\Observer;

require_once __DIR__ . '/../bootstrap.php';
class Main
{
	public function index(): void {
		$userService = new UserService();
		$userService->attach(new EmailNotifier());
		$userService->attach(new SmsNotifier());

		$userService->registerUser('张三', 'zhangsan@example.com');
	}
}

$main = new Main();
$main->index();