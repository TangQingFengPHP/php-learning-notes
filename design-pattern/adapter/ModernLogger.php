<?php

namespace App\Adapter;

// 目标接口（客户端期望的日志格式）
interface ModernLogger
{
	public function log(string $level, string $message): void;
}