<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class GitHubScoreService extends ScoreService
{

	/**
	 * @throws RequestException
	 */
	public function getTermRocksCount( string $termName ) {

		return Http::get('https://api.github.com/search/issues', [
			'q' => $termName . '+rocks',
		])->throw()->json('total_count');
	}

	/**
	 * @throws RequestException
	 */
	public function getTermSucksCount( string $termName ) {

		return Http::get('https://api.github.com/search/issues', [
			'q' => $termName . '+sucks',
		])->throw()->json('total_count');
	}
}
