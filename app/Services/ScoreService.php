<?php

namespace App\Services;

use App\Models\Term;

abstract class ScoreService
{

	protected $termName;

	public function getTermScore( $termName ) {

        $this->termName = $termName;

		$term      = new Term();
		$termScore = $term->getScore( $this->termName );

		if ( isset( $termScore->score ) ) {

			return $termScore->score;
		}

		$termScore = $this->termScoreCalculate();
		$term->scoreInsert( $this->termName, $termScore );

		return $termScore;
	}

	protected function termScoreCalculate()
	{
		$positiveWordCount = $this->getTermRocksCount();
		$negativeWordCount = $this->getTermSucksCount();

		return round( $positiveWordCount / ( $negativeWordCount + $positiveWordCount ), 2 );
	}

	abstract protected function getTermRocksCount();
	abstract protected function getTermSucksCount();

}
