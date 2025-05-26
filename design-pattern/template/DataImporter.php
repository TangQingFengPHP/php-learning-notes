<?php

namespace App\Template;

// 抽象类：数据导入流程
abstract class DataImporter
{
	// 模板方法（定义固定流程）
	/**
	 * @throws \Exception
	 */
	public final function import(string $filePath): void {
		$this->validateFile($filePath);
		$data = $this->readFile($filePath);
		$this->processData($data);
		$this->cleanup();
	}

	// 固定步骤（通用实现）

	/**
	 * @throws \Exception
	 */
	protected function validateFile(string $filePath): void {
		if (!file_exists($filePath)) {
			throw new \Exception("文件 $filePath 不存在");
		}
	}

	// 抽象步骤（由子类实现）
	abstract protected function readFile(string $filePath): array;
	abstract protected function processData(array $data): void;

	// 可选步骤（钩子方法）
	protected function cleanup(): void {
		// 默认无操作，子类可重写
	}
}