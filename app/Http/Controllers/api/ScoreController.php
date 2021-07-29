<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScoreController extends Controller
{
	public function getScore(Request $request){

		if ($request->filled('term')) {
			$arr = array("John", "Mary", "Peter", "Sally");
			$score = json_encode($_GET);

			return response()->json($score);
		}
	}
}
