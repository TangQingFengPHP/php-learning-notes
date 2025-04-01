<?php

namespace App\Attribute;

require_once __DIR__ . '/../bootstrap.php';

use ReflectionClass;

#[MyAttribute("First"), MyAttribute("Second")]
class SameAttributeMultiple
{

}
$reflectionClass = new ReflectionClass(SameAttributeMultiple::class);
$attributesClass = $reflectionClass->getAttributes();

foreach ($attributesClass as $attribute) {
    $instance = $attribute->newInstance();
    echo $instance->name . "\n";
}
