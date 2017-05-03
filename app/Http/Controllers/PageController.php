<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
    	$token      = 'l57bkQ0vVmsX0Z0xo9uIpVJP72CFQB-y2wa52mWfVqk4PpOsAnfqrNVK1xHQk-PRUrnlmClZEjKneBKk';
		$agencyId   = '515';
		$projectId  = '529';
		$from       = date("Y-m-d"); 
		$to         = date('Y-m-d', strtotime(date("d-m-Y", time()) . " + 365 day"));
		$url = "https://data.a-boss.net/v1/agency/" . $agencyId . "/" . $projectId . "/public_events?from=" . $from . "&to=" . $to;

		// create a new cURL resource
		$ch = curl_init();

		// set Header, URL and other appropriate options
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , "Authorization: Bearer " . $token));
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$curlOut = curl_exec($ch);

		// Decode JSON Response
		$response = json_decode($curlOut, true);

		// close cURL resource, and free up system resources
		curl_close($ch);

    	return view('home.index', compact('response'));
    }
}
