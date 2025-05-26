<?php

namespace App\Strategy;

// 具体策略：微信支付
class WechatPayStrategy implements PaymentStrategy
{
	public function pay(float $amount): string {
		return "通过微信支付 $amount 元";
	}
}