<?php

namespace App\Factory;

// 具体工厂：数据库日志工厂
class DbLoggerFactory
{
	public function createLogger(): Logger {
		return new DbLogger();
	}
}