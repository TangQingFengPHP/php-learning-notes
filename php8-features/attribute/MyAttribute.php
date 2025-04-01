<?php
namespace App\Attribute;
use Attribute;

#[Attribute(Attribute::TARGET_ALL | Attribute::IS_REPEATABLE)]
class MyAttribute
{
    public function __construct(public string $name) {}
}