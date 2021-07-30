<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ScoreService;

class ScoreController extends Controller
{
	public function getScore( Request $request, ScoreService $scoreService ) {

			if ( $request->filled( 'term' ) ) {

				$request->validate( [
					'term' => 'required|string|min:1'
				] );

				$term = $request->get( 'term' );

				return response()->json( ['term' => $term, 'score' => $scoreService->getTermScore( $term ) ] );
			} else {

				return response()->json( 'No term params' );
			}

	}
}
