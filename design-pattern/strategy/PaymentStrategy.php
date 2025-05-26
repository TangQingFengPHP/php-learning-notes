<?php

namespace App\Strategy;


// 策略接口：支付方式
interface PaymentStrategy
{
	public function pay(float $amount): string;
}