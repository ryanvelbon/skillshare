<?php

namespace App\Helpers\Traits;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use DB;

trait SearchRelevance {

	/**
     * Calculate a search result's relevance score based on its matching tags count.
     *
     * @param  int     $item_id
     * @param  array   $topic_ids       topic tags applied in filtered search
     * @param  array   $skill_ids       skill tags applied in filtered search
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

	/**
     *
     *
     * @param 
     * @param 
     * @param 
     * @return string
     */
	public function createAndSeedTemporaryTableResultsWithRevelance($result_ids, $topic_ids, $skill_ids){

		$tableName = rand().'_search_'.time();

		Schema::connection('mysql')->create($tableName, function($table){
			$table->increments('id');
			$table->unsignedInteger('item_id');
			$table->tinyInteger('relevance');
		});

		foreach($result_ids as $result_id){
			$relevance = $this->calculateRelevance($result_id, $topic_ids, $skill_ids);
			DB::table($tableName)->insert([ 'item_id' => $result_id, 'relevance' => $relevance ]);
		}

		return $tableName;
	}
}