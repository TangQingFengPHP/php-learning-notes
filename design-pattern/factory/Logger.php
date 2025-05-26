<?php

namespace App\Factory;

// 抽象产品：日志记录器
interface Logger
{
	public function log(string $message): void;
}