<?php

namespace App\Observer;

// 具体主题：用户服务（触发注册事件）
class UserService implements Subject
{
	private array $observers = [];
	private array $userData;

	public function attach(Observer $observer): void {
		$this->observers[] = $observer;
	}

	public function detach(Observer $observer): void {
		$this->observers = array_filter($this->observers, fn($o) => $o !== $observer);
	}

	public function notify(): void {
		foreach ($this->observers as $observer) {
			$observer->update('user.register', $this->userData);
		}
	}

	public function registerUser(string $name, string $email): void {
		$this->userData = ['name' =>  $name, 'email' => $email];
		$this->notify(); // 注册后通知观察者
	}
}