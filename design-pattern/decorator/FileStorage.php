<?php

namespace App\Decorator;

// 抽象组件：文件存储接口
interface FileStorage
{
	public function save(string $path, string $content): void;
	public function read(string $path): string;
}