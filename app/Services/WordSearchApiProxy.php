<?php

namespace App\Services;

interface WordSearchApiProxy {

	public function getRocksCount(string $termName);
	public function getSucksCount(string $termName);
}
