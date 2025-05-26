<?php

namespace App\Observer;

// 观察者接口
interface Observer
{
	public function update(string $event, mixed $data): void;
}