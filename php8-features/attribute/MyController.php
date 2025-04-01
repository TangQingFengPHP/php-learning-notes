<?php

namespace App\Attribute;

use ReflectionClass;

require_once __DIR__ . '/../bootstrap.php';
class MyController
{
    #[Route('/users', 'GET')]
    public function getUsers() {}

    #[Route('/users', 'POST')]
    public function createUser() {}
}

// 解析控制器的方法路由
$reflection = new ReflectionClass(MyController::class);
foreach ($reflection->getMethods() as $method) {
    foreach ($method->getAttributes(Route::class) as $attribute) {
        $route = $attribute->newInstance();
        echo "CustomMethod: {$method->getName()}, Method: {$route->method}, Path: {$route->path}\n";
    }
}