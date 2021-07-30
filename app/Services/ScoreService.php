<?php

namespace App\Services;

use App\Models\Term;

class ScoreService
{
	private $apiInterface;

	public function __construct( ApiInterface $apiInteface ){
		$this->apiInterface = $apiInteface;
	}

    public function getTermScore( string $termName ) {
		$positiveCount = $this->apiInterface->getRocksCount( $termName );
		$negativeCount = $this->apiInterface->getSucksCount( $termName );
//		return $positiveCount;
    }

}
