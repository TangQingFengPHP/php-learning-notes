<?php

namespace App\Match;

require_once __DIR__ . '/../bootstrap.php';

class Main
{
    /**
     * 基本用法
     * @param int $number
     * @return string
     */
    public function basic(int $number): string {
        return match($number) {
            1 => "One",
            2 => "Two",
            3 => "Three",
            default => "Unknown",
        };
    }

    /**
     * 多条件匹配
     * 多个条件可以用逗号分隔，当第一个条件匹配成功时，后续条件将不再匹配。
     * @param string $fruit
     * @return string
     */
    public function multipleMatch(string $fruit): string {
        return match($fruit) {
            "apple", "cherry", "strawberry" => "red",
            "banana", "lemon" => "yellow",
            "grape", "blueberry" => "purple",
            default => "unknown",
        };
    }

    /**
     * 严格匹配，使用 ===
     * 严格匹配要求匹配值必须严格相等才会匹配成功。
     * @param mixed $value
     * @return string
     */
    public function strictMatch(mixed $value): string {
        return match($value) {
            2 => "Matched as integer",
            "2" => "Matched as string",
            default => "Not matched",
        };
    }

    /**
     * 结合数组使用
     * @param int $code
     * @return string
     */
    public function matchCombineArray(int $code): string
    {
        $messages = [
            200 => "OK",
            301 => "Moved Permanently",
            404 => "Not Found",
            500 => "Internal Server Error",
        ];

        return match($code) {
            default => $messages[$code] ?? "Unknown status code",
        };
    }

    /**
     * 结合 throw 关键字，可以抛出异常。
     * @param string $role
     * @return string
     * @throws \Exception
     */
    public function matchCombineThrow(string $role): string {
        return match ($role) {
            "admin" => "Access all",
            "editor" => "Edit content",
            "user" => "View content",
            default => throw new \Exception("Invalid role: $role")
        };
    }

    /**
     * 结合箭头函数使用
     * @param string $input
     * @return string
     */
    public function matchCombineFn(string $input): string {
        $result = fn() => match($input) {
            "php" => "Hypertext Preprocessor",
            "js" => "JavaScript",
            default => "Unknown language",
        };

        return $result();
    }

    /**
     * 结合 true 关键字使用模拟 switch 的 case 逻辑
     * @param int $age
     * @return string
     */
    public function matchCombineTrue(int $age): string {
        return match(true) {
            $age < 18 => "Minor",
            $age >= 18 && $age < 60 => "Adult",
            default => "Senior"
        };
    }
}

$main = new Main();
echo $main->basic(2) . PHP_EOL;
echo $main->multipleMatch("banana") . PHP_EOL;
echo $main->strictMatch("2") . PHP_EOL;
echo $main->matchCombineArray(301) . PHP_EOL;

// 抛异常
//echo $main->matchCombineThrow("banana");
// 正常输出
echo $main->matchCombineThrow("admin") . PHP_EOL;

echo $main->matchCombineFn("php"). PHP_EOL;
echo $main->matchCombineTrue(18);
