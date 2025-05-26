<?php

namespace App\Builder;

// 抽象建造者
interface UserConfigBuilder
{
	public function setTheme(string $theme): self;
	public function enableNotifications(bool $enable): self;
	public function setTimeout(int $seconds): self;
	public function build(): UserConfig;
}