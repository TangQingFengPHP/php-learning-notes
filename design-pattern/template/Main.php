<?php

namespace App\Template;

require_once __DIR__ . '/../bootstrap.php';
class Main
{
	/**
	 * @throws \Exception
	 */
	public function index(): void
	{
		$csvImporter = new CsvImporter();
		$csvImporter->import('data.csv');

		$excelImporter = new ExcelImporter();
		$excelImporter->import('data.xls');
	}
}

$main = new Main();
$main->index();