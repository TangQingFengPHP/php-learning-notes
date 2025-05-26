<?php

namespace App\Singleton;

require_once __DIR__ . '/../bootstrap.php';
class DatabaseConnection
{
	// 保留唯一实例
	private static ?self $instance = null;
	private string $connection;

	private function __construct(string $dsn)
	{
		$this->connection = "Connected to database: $dsn";
	}

	// 禁止克隆（防止复制）
	private function __clone() {}

	public function __wakeup() {
		throw new  \Exception("Cannot unserialize a singleton class");
	}

	// 静态方法获取实例（延迟初始化）
	public static function getInstance(string $dsn = 'mysql:host=localhost'): self {
		if (self::$instance === null) {
			self::$instance = new self($dsn);
		}
		return self::$instance;
	}

	public function getConnection(): string {
		return $this->connection;
	}
}

$db1 = DatabaseConnection::getInstance();
$db2 = DatabaseConnection::getInstance("mysql:host=backup");
var_dump($db1 === $db2);