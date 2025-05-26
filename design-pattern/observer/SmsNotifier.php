<?php

namespace App\Observer;

// 具体观察者：短信通知
class SmsNotifier implements Observer
{
	public function update(string $event, mixed $data): void
	{
		if ($event === 'user.register') {
			$phone = '13800138000';
			echo "发送注册短信到：$phone" . PHP_EOL;
		}
	}
}