<?php

use App\ThrowExpression\SafeArrayMapper;

function safe_key(array $arr, string $key) {
	return SafeArrayMapper::requireKey($arr, $key);
}