<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// 接值Input
use Illuminate\Support\Facades\Input;
// 引入model
use App\Http\Models\TigerModel;


use Illuminate\Support\Facades\Redis;


use Sensitive;

class TigerController extends Controller
{	
	public $Model;
	public function __construct()
	{
		$this->Model= new TigerModel();
		// var_dump($this->Model);die;
	}

	//虎牙前台首页
	public function index(){
		return view('tiger/index');
	}

	public function login(){
		$rank=1;
		echo $rank;die;
		if($rank=='1'){
			 echo '<script>alert("欢迎主播登陆");location.href="'.'tiger_start'.'";</script>';
		}else{
			 echo '<script>location.href="'.'tiger_index'.'";</script>';
		}
	}

	//rank=1为主播 可以开播 否则为普通用户没有开播权限
	public function start(){
		
	}


}