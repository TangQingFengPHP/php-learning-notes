<?php

namespace App\ConstructorPropertyPromotion;

require_once __DIR__ . '/../bootstrap.php';
class UserOld
{
    public string $name;
    public int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

$user = new UserOld('John', 30);
echo $user->name . PHP_EOL; // Output: John
echo $user->age; // Output: 30
