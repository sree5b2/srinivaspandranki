<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ApiController extends Controller
{
    public function getAllUsers($ids,$fmt) {
    	$users = DB::table('users')->whereIn('id', explode(",", $ids))->toArray();
    	if ($fmt==true) {
    		$output = "";
    		foreach ($users as $key => $user) {
    			$output .= implode(",", $user)."<br>";
    		}
    		$users = $output;
    	}
    	else{
    		$output = $users;
    	}
    	$data = ['output'=>$output];
      	return response()->json($data, 201);
    }
}
