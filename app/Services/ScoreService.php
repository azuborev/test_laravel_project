<?php

namespace App\Services;

use App\Models\Term;
use App\Services\Api\Interfaces\WordSearchApiProxy;

class ScoreService
{
	private $wordSearchApiProxy;

	public function __construct( WordSearchApiProxy $wordSearchApiProxy ) {

		$this->wordSearchApiProxy = $wordSearchApiProxy;
	}

    public function getTermScore( string $termName ) {

		$term      = new Term();
		$termScore = $term->getScore( $termName );

		if ( isset( $termScore->score ) ) {

			return $termScore->score;
	    }

		$positiveWordCount = $this->wordSearchApiProxy->getRocksCount( $termName );
		$negativeWordCount = $this->wordSearchApiProxy->getSucksCount( $termName );
		$termScore         = $this->scoreCalculate( $positiveWordCount, $negativeWordCount );
		$term->scoreInsert( $termName, $termScore );

		return $termScore;
    }

    protected function scoreCalculate( $positiveWordCount, $negativeWordCount ) {

		return round( $positiveWordCount / ( $negativeWordCount + $positiveWordCount ), 2 );
    }
}
