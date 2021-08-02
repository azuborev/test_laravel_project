<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'score',
    ];

	public $timestamps = false;

	public function getScore( string $termName ) {

		return $this->select( 'score' )->where( 'name', $termName )->first();
	}

	public function scoreInsert( string $termName, float $termScore ) {

		$this->name  = $termName;
		$this->score = $termScore;

		return $this->save();
	}
}
