<?php

namespace App\Http\Controllers\api;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ScoreService;

class ScoreController extends Controller
{
	public function getScore(Request $request, ScoreService $scoreService){

			if ($request->filled('term')) {
				$score = $scoreService->getTermScore('php');

				return response()->json($score);
			}

	}
}
