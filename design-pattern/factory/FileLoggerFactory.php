<?php

namespace App\Factory;

// 具体工厂：文件日志工厂
class FileLoggerFactory extends LoggerFactory
{
	public function createLogger(): Logger
	{
		return new FileLogger();
	}
}