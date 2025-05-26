<?php

namespace App\Chain;

// 处理者接口
interface RequestHandler
{
	public function setNext(RequestHandler $handle): RequestHandler;
	public function handle(string $request): string;
}