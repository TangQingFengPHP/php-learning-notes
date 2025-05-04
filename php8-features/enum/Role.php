<?php

namespace App\Enum;

/**
 * 具名枚举
 */
enum Role : string
{
	case Admin = 'admin';
	case User = 'user';
	case Guest = 'guest';
}
