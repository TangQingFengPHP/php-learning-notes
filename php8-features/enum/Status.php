<?php

namespace App\Enum;

enum Status
{
	#[Label('草稿')]
	case Draft;
	#[Label('发布')]
	case Published;
	#[Label('归档')]
	case Archived;

	/**
	 * 枚举中添加方法
	 * @return string
	 */
	public function label(): string {
		return match ($this) {
			self::Draft => '草稿',
			self::Published => '已发布',
			self::Archived => '已归档',
		};
	}
}
