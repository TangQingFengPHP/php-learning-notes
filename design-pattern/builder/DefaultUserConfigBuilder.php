<?php

namespace App\Builder;

// 具体建造者
class DefaultUserConfigBuilder implements UserConfigBuilder
{
	private UserConfig $config;

	public function __construct() {
		$this->reset();
	}

	private function reset(): void {
		$this->config = new UserConfig();
		$this->config->theme = 'light';
		$this->config->notifications = true;
		$this->config->timeout = 300;
	}

	public function setTheme(string $theme): self
	{
		$this->config->theme = $theme;
		return $this;
	}

	public function enableNotifications(bool $enable): self
	{
		$this->config->notifications = $enable;
		return $this;
	}

	public function setTimeout(int $seconds): self
	{
		$this->config->timeout = $seconds;
		return $this;
	}

	public function build(): UserConfig
	{
		$config = $this->config;
		$this->reset(); // 重置以便下次构建
		return $config;
	}
}