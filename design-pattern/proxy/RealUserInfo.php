<?php

namespace App\Proxy;

// 真实主题：实际从数据库加载用户信息
class RealUserInfo implements UserInfo
{
	private int $userId;

	public function __construct(int $userId) {
		$this->userId = $userId;
		// 模拟耗时的数据库查询（仅在需要时执行）
		sleep(1);
	}

	public function getProfile(): string {
		return "User {$this->userId}: 姓名=张三，邮箱=zhangsan@example.com";
	}
}