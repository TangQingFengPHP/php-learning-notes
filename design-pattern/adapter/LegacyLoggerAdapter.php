<?php

namespace App\Adapter;

// 适配器：将 LegacyLogger 转换为 ModernLogger 接口
class LegacyLoggerAdapter implements ModernLogger
{
	private LegacyLogger $adaptee;

	public function __construct(LegacyLogger $adaptee)
	{
		$this->adaptee = $adaptee;
	}

	public function log(string $level, string $message): void {
		// 转换格式：将 level + message 拼接为旧日志格式
		$this->adaptee->write("[$level] $message");
	}
}