<?php

namespace App\Attribute;

require_once __DIR__ . '/../bootstrap.php';

use ReflectionClass;

#[Role("Admin"), Loggable]
class UserService {}

$reflection = new ReflectionClass(UserService::class);
$attributes = $reflection->getAttributes();

foreach ($attributes as $attribute) {
    $instance = $attribute->newInstance();
    if ($instance instanceof Role) {
        echo "Role: " . $instance->roleName . "\n";
    } else {
        echo "Attribute: " . $attribute->getName() . "\n";
    }
}