<?php

namespace App\NullSafe;

class Person
{
    public string $name = 'John';

    public ?int $age = null;

    public ?Address $address = null;
}