<?php

namespace App\Strategy;

// 上下文：订单处理
class OrderContext
{
	public PaymentStrategy $paymentStrategy {
		set {
			$this->paymentStrategy = $value;
		}
	}

	public function processPayment(float $amount): string {
		return $this->paymentStrategy->pay($amount);
	}
}