<?php

namespace App\NamedArguments;

require_once __DIR__ . '/../bootstrap.php';
class Main
{
    public function setInfo($name, $age = 18, $city = "Unknown") : void {
        echo "Name: $name, Age: $age, City: $city\n";
    }
}

// 用于类方法
$main = new Main();
$main->setInfo(name: "Bob", city: "Los Angeles");

// 用于构造函数
class Car {
    public function __construct($brand, $color = "black", $price = 10000) {
        echo "Brand: $brand, Color: $color, Price: $price\n";
    }
}

new Car(brand: "Toyota", price: 15000);

// 用于魔术方法 __call
class Test {
    public function __call($name, $arguments) {
        print_r($arguments);
    }
}

$obj = new Test();
$obj->someMethod(param1: "Hello", param2: "World", abc: "def");

function greet($name, $greeting) : void {
    echo "$greeting, $name!\n";
}

// 传统位置参数调用
greet("John", "Hello"); // Output: Hello, John!

// 命名参数调用
greet(name: "Alice", greeting: "Hello"); // Output: Hello, Alice!

// 位置参数和命名参数混合调用
greet("Bob", greeting: "Hi"); // Output: Hi, Bob!

// 位置参数必须在命名参数之前
//greet(greeting: "Hi", "John");

function createUser($name, $age = 18, $city = "Unknown") : void {
    echo "Name: $name, Age: $age, City: $city\n";
}

// 传统位置参数调用
createUser("Alice", 25, "New York");

// 命名参数调用
createUser(name: "Bob", city: "New York");

// 不能用于变长参数
function addNumbers(int ...$numbers) : int {
    return array_sum($numbers);
}

//addNumbers(numbers: 1, 2, 3, 4); // 语法错误
//addNumbers(1, 2, 3, 4); // 正确

// 结合ReflectionFunction 可以获取命名参数
$reflection = new \ReflectionClass(Main::class);
$method = $reflection->getMethod('setInfo');
print_r($method->getParameters());
