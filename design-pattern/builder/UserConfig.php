<?php

namespace App\Builder;

// 产品类：用户配置
class UserConfig
{
	public string $theme;
	public bool $notifications;
	public int $timeout;

	public function __toString(): string
	{
		return "Theme: $this->theme, Notifications: " .
			($this->notifications ? 'On' : 'Off') .
			", Timeout: $this->timeout";
	}
}