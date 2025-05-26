<?php

namespace App\Chain;

// 抽象处理者（公共逻辑）
abstract class AbstractRequestHandler implements RequestHandler
{
	private ?RequestHandler $nextHandler = null;

	public function setNext(RequestHandler $handle): RequestHandler
	{
		$this->nextHandler = $handle;
		return $handle;
	}

	public function handle(string $request): string
	{
		if ($this->nextHandler != null) {
			return $this->nextHandler->handle($request);
		}

		return $request;
	}
}