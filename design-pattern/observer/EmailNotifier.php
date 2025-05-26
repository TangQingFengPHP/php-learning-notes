<?php

namespace App\Observer;

// 具体观察者：邮件通知
class EmailNotifier implements Observer
{
	public function update(string $event, mixed $data): void {
		if ($event === 'user.register') {
			$email = $data['email'];
			echo "发送注册邮件到：$email" . PHP_EOL;
		}
	}
}