<?php

namespace App\Attribute;

use ReflectionClass;

require_once __DIR__ . '/../bootstrap.php';

// 多个属性每行一个分开写
#[MyAttribute("attribute1")]
#[OnlyForClassAndMethod]
class MultipleAttributeClass {}

// 多个属性可写在一行
#[MyAttribute("attribute2"), OnlyForClassAndMethod]
class MultipleAttributeClass2 {}

$reflection = new ReflectionClass(MultipleAttributeClass::class);
$attributes = $reflection->getAttributes();

foreach ($attributes as $attribute) {
    echo $attribute->getName(). "\n";
}