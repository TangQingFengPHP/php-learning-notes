<?php

namespace App\Decorator;

// 具体组件：基础文件存储
class BasicFileStorage implements FileStorage
{
	public function save(string $path, string $content): void {
		file_put_contents($path, $content);
	}

	public function read(string $path): string {
		return file_get_contents($path) ? : '';
	}
}