<?php

namespace App\Strategy;

// 具体策略：支付宝支付
class AlipayStrategy implements PaymentStrategy
{
	public function pay(float $amount): string
	{
		return "通过支付宝支付 $amount 元";
	}
}