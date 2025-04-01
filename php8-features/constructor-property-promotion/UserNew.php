<?php

namespace App\ConstructorPropertyPromotion;

require_once __DIR__ . '/../bootstrap.php';
class UserNew
{
    public function __construct(public string $name, public int $age) {}
}

$user = new UserNew('John', 30);
echo $user->name . "\n"; // Output: John
echo $user->age; // Output: 30