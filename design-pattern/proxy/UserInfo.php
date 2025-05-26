<?php

namespace App\Proxy;

// 主题接口：用户信息
interface UserInfo
{
	public function getProfile(): string;
}