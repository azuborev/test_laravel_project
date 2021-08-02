<?php

namespace App\Services\Api\Interfaces;

interface WordSearchApiProxy {

	public function getRocksCount(string $termName);
	public function getSucksCount(string $termName);
}
