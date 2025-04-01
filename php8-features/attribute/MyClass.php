<?php
namespace App\Attribute;

require_once __DIR__ . '/../bootstrap.php';

use ReflectionClass;
use ReflectionClassConstant;
use ReflectionMethod;
use ReflectionProperty;

// 属性注解用在类上
#[MyAttribute("Hello World")]
class MyClass {
    // 属性注解用在常量上
    #[MyAttribute("My Constant")]
    public const MY_CONST = "Hello World";

    // 属性注解用在属性上
    #[MyAttribute("My Name")]
    public string $name;

    // 属性注解用在方法上
    #[MyAttribute("My Method")]
    public function myMethod(): void {}

    // 属性注解用在方法参数上
    public function greet(#[MyAttribute("Parameter annotation")] string $name) {
        echo "Hello, " . $name . "!\n";
    }
}

// 获取类的属性
$reflectionClass = new ReflectionClass(MyClass::class);
$attributesClass = $reflectionClass->getAttributes();

foreach ($attributesClass as $attribute) {
    $instance = $attribute->newInstance();
    echo $instance->name . "\n";
}

// 获取常量的属性
$reflectionConstant = new ReflectionClassConstant(MyClass::class, 'MY_CONST');
$attributesConstant = $reflectionConstant->getAttributes();
foreach ($attributesConstant as $attribute) {
    $instance = $attribute->newInstance();
    echo $instance->name . "\n";
}

// 获取属性的属性
$reflectionProperty = new ReflectionProperty(MyClass::class, 'name');
$attributesProperty = $reflectionProperty->getAttributes();

foreach ($attributesProperty as $attribute) {
    $instance = $attribute->newInstance();
    echo $instance->name . "\n";
}

// 获取方法的属性
$reflectionMethod = new ReflectionMethod(MyClass::class, 'myMethod');
$attributesMethod = $reflectionMethod->getAttributes();

foreach ($attributesMethod as $attribute) {
    $instance = $attribute->newInstance();
    echo $instance->name . "\n";
}

// 获取方法参数的属性
// 获取greet方法参数属性注解
$reflectionMethod = new ReflectionMethod(MyClass::class, 'greet');
$parameters = $reflectionMethod->getParameters();
foreach ($parameters as $parameter) {
    $attributes = $parameter->getAttributes();
    foreach ($attributes as $attribute) {
        $instance = $attribute->newInstance();
        echo $instance->name . "\n";
    }
}