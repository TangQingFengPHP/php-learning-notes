<?php

namespace App\MixedType;

require_once __DIR__ . '/../bootstrap.php';

class Main
{
    /**
     * 混合类型包括：
     * - 整数(int)
     * - 浮点数(float)
     * - 字符串(string)
     * - 布尔值(bool)
     * - 数组(array)
     * - 对象(object)
     * - 可回调函数(callable)
     * - NULL
     * @param mixed $input
     * @return mixed
     */
    public function example(mixed $input): mixed {
        return $input;
    }
}

$main = new Main();
$res = $main->example(123);
echo $res . PHP_EOL;

$res2 = $main->example("hello world");
echo $res2 . PHP_EOL;