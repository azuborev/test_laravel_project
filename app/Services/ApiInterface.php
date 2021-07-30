<?php

namespace App\Services;

interface ApiInterface {

	public function getRocksCount(string $termName);
	public function getSucksCount(string $termName);
}
