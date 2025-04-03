<?php

namespace App\NullSafe;
require_once __DIR__ . '/../bootstrap.php';

class Main
{
    public function index(): void
    {
        // 基本用法
        $person = new Person();
        echo $person?->name . "\n";

        $person2 = null;
        echo $person2?->name . "\n";

        // 访问对象的方法
        $user = new User();
        echo $user?->getName() . "\n";

        $user2 = null;
        echo $user2?->getName() . "\n";

        // 访问嵌套对象
        $person3 = new Person();
        echo $person3->address?->city . "\n";
        $person3->address = new Address();
        echo $person3->address?->city . "\n";

        // ?-> 结合数组
        // 不能用于数组索引（[]），但可以用于 ArrayAccess 对象
        // $data = null;
        // echo $data?['key']; 语法错误：不能用于数组

        // 解决方案：使用 ArrayAccess 对象
        $collection = new Collection();
        echo $collection?->offsetGet('name') . "\n"; // 输出 Alice

        $collection2 = null;
        echo $collection2?->offsetGet('name') . "\n";

        // ?-> 链式调用
        $department = new Department();
        echo $department?->manager?->age ?? 18 . "\n";

        // ?-> 不能用于赋值，只能用于访问
        // $person4 = null;
        // $person4?->name = 'John';

        // ?-> 不能用于静态方法
        // echo Test?->hello() . "\n";

        // ?-> 和 ?? 的区别
        // ?-> 用于访问对象属性，?? 用于变量默认值
        // ?-> 用于对象，?? 用于 null 合并
        $person5 = null;
        echo $person5?->name . "\n";

        echo $person5?->name ?? 'Default Name' . "\n";
    }
}

$res = new Main();
$res->index();

// ?-> 结合函数返回值
function getUser() {
    return null;
}

echo getUser()?->name ?? 'default' . "\n";