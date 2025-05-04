<?php

namespace App\Enum;

#[\Attribute]
class Label
{
	public function __construct(public string $text)
	{
	}
}