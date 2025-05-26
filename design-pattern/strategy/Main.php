<?php

namespace App\Strategy;

require_once __DIR__ . '/../bootstrap.php';
class Main
{
	public function index(): void {
		$order = new OrderContext();

		// 选择支付宝支付
		$order->paymentStrategy = new AlipayStrategy();
		echo $order->processPayment(99.9) .  PHP_EOL;

		// 选择微信支付
		$order->paymentStrategy = new WechatPayStrategy();
		echo $order->processPayment(199.9);
	}
}

$main = new Main();
$main->index();