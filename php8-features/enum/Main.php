<?php

namespace App\Enum;

require_once __DIR__ . '/../bootstrap.php';

class Main
{
	public function index(): void
	{
		// 枚举基本使用
		$status = Status::Published;

		if ($status == Status::Draft) {
			echo '草稿' . PHP_EOL;
		} else {
			echo '已发布' . PHP_EOL;
		}

		// 具名枚举使用
		$role = Role::Admin;
		echo $role->value . PHP_EOL;

		// 具名枚举反查
		$roleName = Role::from('user');
		echo $roleName->name .  PHP_EOL;

		// 遍历枚举
		foreach (Role::cases() as $role) {
			echo $role->name . ' => ' .  $role->value . PHP_EOL;
		}

		// 调用枚举中的方法
		echo Status::Draft->label() . PHP_EOL;

		// 读取枚举中的属性注解
		$ref = new \ReflectionEnumUnitCase(Status::class, 'Draft');
		$attrs = $ref->getAttributes(Label::class);
		$label = $attrs[0]->newInstance()->text;
		echo $label . PHP_EOL;
	}
}

$main = new Main();
$main->index();