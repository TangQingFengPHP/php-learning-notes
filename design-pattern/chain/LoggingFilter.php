<?php

namespace App\Chain;

// 具体处理者：日志记录
class LoggingFilter extends AbstractRequestHandler
{
	public function handle(string $request): string
	{
		echo "记录请求：$request" . PHP_EOL;
		return parent::handle($request);
	}
}