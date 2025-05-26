<?php

namespace App\Chain;

require_once __DIR__ . '/../bootstrap.php';
class Main
{
	public function index(): void
	{
		$chain = new SensitiveWordFilter();
		$chain->setNext(new HtmlEscapeFilter())->setNext(new LoggingFilter());

		$input = '用户输入：<script>非法内容</script>';
		$result = $chain->handle($input);
		echo "最终处理结果：$result";
	}
}

$main = new Main();
$main->index();