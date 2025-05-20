<?php

namespace App\Miscellaneous;

use BcMath\Number;
use Random\Engine\Mt19937;

require_once __DIR__ . '/../bootstrap.php';
class Main
{
	// 类型化常量
	public const int MAX_USERS = 100;

	// set hook
	private bool $modified = false;
	public string $name {
		get {
			return $this->modified ? strtoupper($this->name) : $this->name;
		}
		set(string $value) {
			$this->name = trim($value);
			$this->modified = true;
		}
	}

	// set hook 使用箭头函数语法
	public float $price {
		get => $this->price;
		set => $this->price = max(0, $value);
	}

	// 不对称可见性
	public private(set) string $version = '8.4';
	public function index() {
		// array_is_list() 函数用法
		// 检查数组是否为 索引数组（列表）
		var_dump(array_is_list(['a', 'b', 'c']));
		echo "\n";
		var_dump(array_is_list(['a' => 'apple', 'b' => 'banana']));
		echo "\n";

		// 新的 Random 扩展
		$rng = new Mt19937();
		echo $rng->generate();
		echo "\n";

		// json_validate 函数用法
		// 检查 JSON 字符串是否有效
		$json = '{"name": "John", "age": 30, "city": "New York"}';
		var_dump(json_validate($json));
		echo "\n";
		var_dump(json_validate('{invalid json}'));
		echo "\n";
		echo self::MAX_USERS;

		// 新的BcMath\Number 类
		$num1 = new Number('22');
		$num2 = new Number('7');
		$result = ($num1 / $num2) + $num1 - $num2;
		echo $result . PHP_EOL;

		// 新的数组函数
		// array_find()，找到第一个满足条件的元素
		$animals = ['dog', 'cat', 'cow', 'duck', 'goose'];
		$animal = array_find($animals, static fn (string $value): bool => str_starts_with($value, 'c'));
		echo $animal . PHP_EOL; // cat

		// array_find_key()，找到第一个满足条件的键
		$data = ['name' => 'John', 'age' => 30, 'city' => 'New York'];
		$key = array_find_key($data, static fn (string $value): bool => str_starts_with($value, 'N'));
		echo $key . PHP_EOL; // city

		// array_any()，检查数组中是否有元素满足条件，只要有一个满足，就返回 true
		$numbers = [1, 2, 3, 4, 5];
		$result = array_any($numbers, static fn (int $value): bool => $value > 3);
		echo $result . PHP_EOL;

		// array_all()，检查数组中是否所有元素满足条件，只有全部满足，才返回 true
		$result = array_all($numbers, static fn (int $value): bool => $value > 0);
		echo $result . PHP_EOL;

		// 太空船运算符
		echo "太空船运算符" . PHP_EOL;
		var_dump(1 <=> 2);
		var_dump(2 <=> 2 );
		var_dump(3 <=> 2);

		// 匿名类
		$obj = new class {
			public function sayHello() {
				return 'Hello!';
			}
		};
		echo $obj->sayHello();

		// Throwable 新接口
		try {
			throw new \Error("发生错误");
		} catch (\Throwable $e) {
			echo $e->getMessage() . PHP_EOL;
		}

		// 整数除法
		echo intdiv(10, 3) . PHP_EOL;

		echo $this->test(null) . PHP_EOL;

		$this->noReturn();

		// 短数组解构
		$data = [1, 2, 3];
		[$a, $b, $c] = $data;
		echo $a . PHP_EOL;
		echo $b . PHP_EOL;
		echo $c . PHP_EOL;

		// ??= 合并赋值运算符
		$username ??= "Guest";
		echo $username . PHP_EOL;
	}

	// 可空类型
	public function test(?string $name) {
		return $name;
	}

	// void 返回类型
	public function noReturn(): void {
		echo "no return" .  PHP_EOL;
	}
}

$main = new Main();
$main->index();

// 调用set hook
$main->name = "";
echo $main->name;
echo "\n";
$main->name = "John";
echo $main->name;
echo "\n";

// 调用set hook 使用箭头函数语法
$main->price = 0;
echo $main->price;
echo "\n";
$main->price = 10;
echo $main->price;
echo "\n";

// 不对称性示例
echo $main->version;
//$main->version = '8.5'; // 已经报错了