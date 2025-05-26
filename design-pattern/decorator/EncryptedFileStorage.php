<?php

namespace App\Decorator;

// 装饰器：添加加密功能
class EncryptedFileStorage implements FileStorage
{
	private FileStorage $storage;
	private string $key = 'secret_key';

	public function __construct(FileStorage $storage)
	{
		$this->storage = $storage;
	}

	public function save(string $path, string $content): void {
		$encrypted = openssl_encrypt($content, 'AES-256-CBC', $this->key);
		$this->storage->save($path, $encrypted);
	}

	public function read(string $path): string {
		$encrypted = $this->storage->read($path);
		return openssl_decrypt($encrypted, 'AES-256-CBC', $this->key) ? : '';
	}
}