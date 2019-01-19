<?php

namespace App\Helpers\Traits;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use DB;

trait Zoo {

	/**
     * Calculate a search result's relevance score based on its matching tags count.
     *
     * @param  \Illuminate\Database\Eloquent\Model   Model    $item
     * @param topic tags applied in filtered search  array    $topics
     * @param skill tags applied in filtered search  array    $skills
     * @return int
     */
	private function calculateRelevance(){
		return random_int(1, 5);
	}

	public function storeResultsWithRelevanceInTempTable($results){

		$tableName = '_temp_search_results_'.time();

		Schema::connection('mysql')->create($tableName, function($table){
			$table->increments('id');
			$table->unsignedInteger('item_id');
			$table->tinyInteger('relevance');
		});

		// return $tableName;

		foreach($results as $result){
			DB::table($tableName)->insert([ 'item_id' => $result->id, 'relevance' => $this->calculateRelevance() ]);
		}
	}
}