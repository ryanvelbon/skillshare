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
     * @param int     $item_id
     * @param array   $topic_ids       topic tags applied in filtered search
     * @param array   $skill_ids       skill tags applied in filtered search
     * @return int
     */
	private function calculateRelevance($item_id, $topic_ids, $skill_ids){
		// return random_int(1, 5);

		$count = 0;

		// do the same for topics

		foreach($topic_ids as $topic_id){
			$sql = 'SELECT 1 FROM topic_user WHERE (user_id = '.$item_id.' AND topic_id = '.$topic_id.')';
			if(DB::select(DB::raw($sql))){
				$count++;
			}
		}

		foreach($skill_ids as $skill_id){
			$sql = 'SELECT 1 FROM skill_user WHERE (user_id = '.$item_id.' AND skill_id = '.$skill_id.')';
			if(DB::select(DB::raw($sql))){
				$count++;
			}
		}

		return $count;
	}

	public function storeResultsWithRelevanceInTempTable($results){

		$tableName = '_temp_search_results_'.time();

		Schema::connection('mysql')->create($tableName, function($table){
			$table->increments('id');
			$table->unsignedInteger('item_id');
			$table->tinyInteger('relevance');
		});

		// return $tableName;

		$topic_ids = [1,2,3,4,5]; // dummy
		$skill_ids = [1,2,3,4,5]; // dummy

		foreach($results as $result){
			$relevance = $this->calculateRelevance($result->id, $topic_ids, $skill_ids);
			DB::table($tableName)->insert([ 'item_id' => $result->id, 'relevance' => $relevance ]);
		}
	}
}