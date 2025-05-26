<?php

namespace App\Chain;

// 具体处理者：敏感词过滤
class SensitiveWordFilter extends AbstractRequestHandler
{
	public function handle(string $request): string
	{
		$filtered = str_replace(['非法', '违禁'], '***', $request);
		return parent::handle($filtered);
	}
}