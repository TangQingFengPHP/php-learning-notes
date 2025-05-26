<?php

namespace App\Observer;

// 主题接口
interface Subject
{
	public function attach(Observer $observer): void;
	public function detach(Observer $observer): void;
	public function notify(): void;
}