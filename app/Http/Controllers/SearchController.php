<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Listing;

class SearchController extends Controller
{
    /**
     * DRY solution ;-)
     * *PENDING* Perhaps certain tables require a custom hint-generator of their own.
     * @return array hints (names of Users, Listings, Groups, or Events.)
     */
    public function getHints(Request $request)
    {
        $q = $request->q;
        $table_name = $request->table;

        $names = array();

        // It is more secure to use a switch rather than directly injecting $table_name into our SQL query.
        // Otherwise hacker can pass in any table name he wants and confidential data can be output as a hint.
        switch($table_name){
        	case "users":
        		$names = User::all()->pluck('username');
        		break;
        	case "listings":
        		$names = Listing::all()->pluck('title');
        		break;
        	case "groups":
        		// *PENDING*
        		break;
        	case "events":
        		// *PENDING*
        		break;
        }

        $hints = array();

        if($q !== "") {
            $q = strtolower($q);
            $len = strlen($q);
            foreach($names as $name) {
                if(stristr($q, substr($name, 0, $len))) {
                    array_push($hints, $name);
                }
            }
        }

        return json_encode($hints);
    }
}
