<?php

namespace App\Proxy;

// 代理：延迟加载真实对象
class UserInfoProxy implements UserInfo
{
	private ?RealUserInfo $realUser = null;
	private int $userId;

	public function __construct(int $userId) {
		$this->userId = $userId;
	}

	public function getProfile(): string
	{
		if ($this->realUser === null) {
			$this->realUser = new RealUserInfo($this->userId);
		}
		return $this->realUser->getProfile();
	}

}