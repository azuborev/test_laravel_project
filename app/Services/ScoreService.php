<?php

namespace App\Services;

use App\Models\Term;

class ScoreService
{
	private $wordSearchApiProxy;

	public function __construct( WordSearchApiProxy $wordSearchApiProxy ){
		$this->wordSearchApiProxy = $wordSearchApiProxy;
	}

    public function getTermScore( string $termName ) {
		$positiveCount = $this->wordSearchApiProxy->getRocksCount( $termName );
		$negativeCount = $this->wordSearchApiProxy->getSucksCount( $termName );
//		return $positiveCount;
    }

}
