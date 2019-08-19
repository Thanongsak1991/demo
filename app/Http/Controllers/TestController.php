<?php 
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TestController extends BaseController
{
	public function index()
	{
		$arr = array("Name"=>"Thanongsak","Surname"=>"Sritha");
		echo '<pre>'.print_r($arr,true).'<pre>';
		echo json_encode($arr);
	}

	public function create()
	{
		$result = sqrt(25)+sqrt(18)+sqrt(2)-sqrt(32);
		echo $result;
	}

	public function order()
	{
		return 'order';
	}
}