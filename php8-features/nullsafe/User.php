<?php

namespace App\NullSafe;

class User
{
    public function getName(): string {
        return "Alice";
    }
}