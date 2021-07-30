<?php

namespace App\Services;

use App\Models\Term;

class ScoreService
{
	private $wordSearchApiProxy;

	public function __construct( WordSearchApiProxy $wordSearchApiProxy ) {

		$this->wordSearchApiProxy = $wordSearchApiProxy;
	}

    public function getTermScore( string $termName ) {

		$term = new Term();
		$termScore = $term->getScore( $termName );

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
