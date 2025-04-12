<?php

namespace App\NewStringFunction;

require_once __DIR__ . '/../bootstrap.php';

class Main
{
	public function main(): void
	{
		// 字符串包含
		$str = "Hello World";
		// php7 写法
		if (strpos($str, "World") !== false)
		{
			echo "包含 World" . PHP_EOL;
		}
		// php8 写法
		if (str_contains($str, "World"))
		{
			echo "包含 World" . PHP_EOL;
		}

		// 判断字符串是否以某个子字符串开头
		// php7 写法
		if (strpos($str, "Hello") === 0)
		{
			echo "以 Hello 开头" . PHP_EOL;
		}
		// php8 写法
		if (str_starts_with($str, "Hello"))
		{
			echo "以 Hello 开头" . PHP_EOL;
		}

		// 判断字符串是否以某个子字符串结尾
		// php7 写法
		if (substr($str, -5) === "World")
		{
			echo "以 World 结尾" . PHP_EOL;
		}
		// php8 写法
		if (str_ends_with($str, "World"))
		{
			echo "以 World 结尾" . PHP_EOL;
		}

		// fdiv 计算浮点数除法
		// 虽然不是专门的字符串函数，但在涉及字符串格式化时常会用到数学函数。fdiv() 是安全的浮点除法，即使除数为 0 也不会抛出错误
		echo fdiv(10, 2);
		echo "\n";
		echo fdiv(10, 0);
		echo "\n";
		echo fdiv(-10, 0);
		echo "\n";
		echo fdiv(0, 0);
		echo "\n";

		// get_debug_type() 获取变量类型
		// 获取变量的真实类型，适合调试（尤其是字符串、对象处理时）。
		echo get_debug_type("hello");
		echo "\n";
		echo get_debug_type(123);
		echo "\n";
		echo get_debug_type(new \stdClass());
		echo "\n";
		echo get_debug_type(null);
		echo "\n";
		echo get_debug_type([]);
		echo "\n";
		echo get_debug_type(true);
		echo "\n";
	}
}

$main = new Main();
$main->main();