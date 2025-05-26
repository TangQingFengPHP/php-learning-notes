<?php

namespace App\Template;

// 具体子类：Excel 数据导入
class ExcelImporter extends DataImporter
{
	protected function readFile($filePath): array
	{
		// 使用 PhpSpreadsheet 读取 Excel
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
		$worksheet = $spreadsheet->getActiveSheet();
		return $worksheet->toArray();
	}

	protected function processData(array $data): void {
		echo "处理Excel 数据：" . count($data) . "行" .  PHP_EOL;
	}

	// 重写钩子方法（清理临时文件）
	protected function cleanup(): void
	{
		echo "清理 Excel 临时文件" . PHP_EOL;
	}
}