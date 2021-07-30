<?php


namespace App\Services;

use App\Services\ApiInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class GitHubApi implements ApiInterface
{

	/**
	 * @throws RequestException
	 */
	public function getRocksCount( string $termName ) {

		return Http::get('https://api.github.com/search/issues', [
			'q' => $termName . '+rocks',
		])->throw()->json('total_count');
	}

	/**
	 * @throws RequestException
	 */
	public function getSucksCount( string $termName ) {

		return Http::get('https://api.github.com/search/issues', [
			'q' => $termName . '+sucks',
		])->throw()->json('total_count');
	}
}
