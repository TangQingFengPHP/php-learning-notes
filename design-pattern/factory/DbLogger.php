<?php

namespace App\Factory;

// 具体产品：数据库日志
class DbLogger implements Logger
{
	public function log(string $message): void {
		// 模拟写入数据库
		echo "Logged to DB: $message" . PHP_EOL;
	}
}