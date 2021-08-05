<?php

namespace App\Services;

use App\Models\Term;

abstract class ScoreService
{

	public function getTermScore( $termName )
	{

		$term      = new Term();
		$termScore = $term->getScore( $termName );

		if ( isset( $termScore->score ) ) {

			return $termScore->score;
		}

		$termScore = $this->termScoreCalculate( $termName );
		$term->scoreInsert( $termName, $termScore );

		return $termScore;
	}

	protected function termScoreCalculate( $termName )
	{
		$positiveWordCount = $this->getTermRocksCount( $termName );
		$negativeWordCount = $this->getTermSucksCount( $termName );

		return round( $positiveWordCount / ( $negativeWordCount + $positiveWordCount ), 2 );
	}

	abstract protected function getTermRocksCount( $termName );
	abstract protected function getTermSucksCount( $termName );

}
