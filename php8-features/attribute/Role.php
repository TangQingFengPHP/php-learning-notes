<?php

namespace App\Attribute;

use Attribute;

#[Attribute]
class Role
{
    public function __construct(public string $roleName) {}
}