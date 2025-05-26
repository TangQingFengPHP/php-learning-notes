<?php

namespace App\Chain;

// 具体处理者：HTML 转义
class HtmlEscapeFilter extends AbstractRequestHandler
{
	public function handle(string $request): string
	{
		$escaped = htmlspecialchars($request, ENT_QUOTES);
		return parent::handle($escaped);
	}
}