<?php

namespace App\Proxy;

require_once __DIR__ . '/../bootstrap.php';

class Main
{
	public function index(): void {
		$proxy = new UserInfoProxy(1001);
		echo "开始获取用户信息..." . PHP_EOL;
		echo $proxy->getProfile(); // 此时才会触发真实对象的加载（延迟1秒）
	}
}

$main = new Main();
$main->index();