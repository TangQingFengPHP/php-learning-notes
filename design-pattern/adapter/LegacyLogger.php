<?php

namespace App\Adapter;

// 适配者（旧日志类，接口不兼容）
class LegacyLogger
{
	public function write(string $message): void {
		file_put_contents('legacy.log', $message . PHP_EOL, FILE_APPEND);
	}
}