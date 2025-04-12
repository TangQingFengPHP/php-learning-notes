<?php

namespace App\ThrowExpression;

use InvalidArgumentException;

require_once __DIR__ . '/../bootstrap.php';

class SafeArrayMapper
{
	/**
	 * 验证字段是否存在
	 */
	public static function requireKey(array $item, string $key): mixed
	{
		return $item[$key] ?? throw new InvalidArgumentException("Missing required key: '$key'");
	}

	/**
	 * 验证字段存在且类型正确
	 */
	public static function requireType(array $item, string $key, string $type): mixed
	{
		$value = $item[$key] ?? throw new InvalidArgumentException("Missing required key: '$key'");
		if (gettype($value) !== $type) {
			throw new InvalidArgumentException("Key '$key' must be of type $type, got " . gettype($value));
		}
		return $value;
	}

	/**
	 * 批量映射数据并自动验证
	 *
	 * @param array $data 多项数据
	 * @param callable $callback 映射函数，接收单项
	 * @return array 处理结果
	 */
	public static function map(array $data, callable $callback): array
	{
		return array_map(function ($item) use ($callback) {
			if (!is_array($item)) {
				throw new InvalidArgumentException("Each item must be an array");
			}
			return $callback($item);
		}, $data);
	}
}

// 字段校验 + DTO 构建
class UserDTO
{
	public function __construct(public string $name, public int $age) {}
}

$rawUsers = [
	['name' => 'Alice', 'age' => 28, 'email' => 'alice@example.com'],
	['name' => 'Bob', 'age' => 35, 'email' => 'bob@example.com'],
	['age' => 22]
];

$users = SafeArrayMapper::map($rawUsers, fn($item) =>
	new UserDTO(
		SafeArrayMapper::requireType($item, 'name', 'string'),
		SafeArrayMapper::requireType($item, 'age', 'integer')
	)
);

print_r($users);

// 快速获取字段数组（e.g. 所有 email）
$raw = [
	['email' => 'alice@example.com', 'age' => 28],
	['email' => 'bob@example.com', 'age' => 35],
	['email' => 'charlie@example.com', 'age' => 22]
];

$emails = SafeArrayMapper::map($raw, fn($item) => SafeArrayMapper::requireKey($item, 'email'));
print_r($emails);

// 使用全局helper函数
$emails2 = SafeArrayMapper::map($raw, fn($item) => safe_key($item, 'email'));
print_r($emails2);

