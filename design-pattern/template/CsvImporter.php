<?php

namespace App\Template;

// 具体子类：CSV 数据导入
class CsvImporter extends DataImporter
{
	protected function readFile(string $filePath): array
	{
		$handle = fopen($filePath, 'r');
		$data = [];
		while (($row = fgetcsv($handle)) !== false) {
			$data[] = $row;
		}
		fclose($handle);
		return $data;
	}

	protected function processData(array $data): void
	{
		echo "处理 CSV 数据：" . count($data) . "行" . PHP_EOL;
	}
}