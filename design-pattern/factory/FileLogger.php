<?php

namespace App\Factory;

// 具体产品：文件日志
class FileLogger implements Logger {
	public function log(string $message): void {
		file_put_contents('app.log', $message . PHP_EOL, FILE_APPEND);
	}
}