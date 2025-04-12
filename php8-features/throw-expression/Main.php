<?php

namespace App\ThrowExpression;

use Exception;
use InvalidArgumentException;

require_once __DIR__ . '/../bootstrap.php';

class Main
{
	public function index(mixed $input) {
		// 用于三元表达式中
		$value = $input !== null ? $input : throw new InvalidArgumentException('Input cannot be null');
		echo $value . PHP_EOL;

		// 传统写法
		if ($input !== null) {
			$value = $input;
		} else {
			throw new InvalidArgumentException('Input cannot be null');
		}

		echo $value . PHP_EOL;

		// 用于null合并运算符
		$username = $input ?? throw new InvalidArgumentException('Input cannot be null');
		echo $username . PHP_EOL;

		// 传统写法
		if (!isset($input))
		{
			throw new InvalidArgumentException('Input cannot be null');
		}
		$username = $input;
		echo $username . PHP_EOL;

		// 用于箭头函数中
		$fn = fn($input) => $input ?? throw new InvalidArgumentException('Input cannot be null');
		echo $fn(10) . PHP_EOL; // Output: 10
		echo $fn(null) . PHP_EOL; // Output: InvalidArgumentException: Input cannot be null

		// 用于逻辑表达式中
		is_string($input) || throw new InvalidArgumentException('Input must be a string');
		echo $input . PHP_EOL;

		// 用于match() 结合 throw 表达式
		echo match($input) {
			'json' => 'application/json',
			'html' => 'text/html',
			default => throw new InvalidArgumentException('Unsupported input type.'),
		};

		// array_map() 结合 throw 表达式
		// 基本示例：抛出非法元素异常
		$data = [1, 2, 'x', 4];

		$result = array_map(fn($item) =>
			is_int($item)
				? $item * 2
				: throw new InvalidArgumentException('Input must be an integer'),
			$data
		);
		print_r($result);

		// 高级示例：检查字段存在性
		$users = [
			['name' => 'Alice'],
			['name' => 'Bob'],
			['email' => 'carol@example.com'],
		];
		$names = array_map(fn($user) =>
			$user['name'] ?? throw new InvalidArgumentException("Name is required: " . json_encode($user)),
			$users
		);
		print_r($names);
	}

}

$main = new Main();
$main->index("json"); // Output: 10
$main->index(123); // Output: InvalidArgumentException: Input cannot be null

// 用作函数参数返回值
function getUser($id) {
	return $id > 0 ? "User ID: $id" : throw new InvalidArgumentException('User ID cannot be null');
}

echo getUser(1);
echo "\n";
echo getUser(-1);

class UserDTO {
	public function __construct(public string $name) {}
}

$raw = [['name' => 'Tom'], ['foo' => 'bar']];

$users = array_map(fn($item) =>
	isset($item['name'])
		? new UserDTO($item['name'])
		: throw new Exception("Invalid user item: ". json_encode($item)),
	$raw
);
print_r($users);