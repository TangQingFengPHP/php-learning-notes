<?php

namespace App\Decorator;

// 装饰器：添加日志功能
class LoggedFileStorage implements FileStorage
{
	private FileStorage $storage;

	public function __construct(FileStorage $storage)
	{
		$this->storage = $storage;
	}

	public function save(string $path, string $content): void {
		echo "Log: Saving file $path" . PHP_EOL;
		$this->storage->save($path, $content);
	}

	public function read(string $path): string {
		echo "Log: Reading file $path" . PHP_EOL;
		return $this->storage->read($path);
	}
}