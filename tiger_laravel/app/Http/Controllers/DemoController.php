<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// 接值Input
use Illuminate\Support\Facades\Input;
// 引入model
use App\Http\Models\DemoModel;


use Illuminate\Support\Facades\Redis;


use Sensitive;



class DemoController extends Controller{
    public $aaa;
    public $red;
	public $Model; 
	public function __construct()
	{
		$this->Model= new DemoModel();
		// var_dump($this->Model);die;
	}


	public function index(){
       // $this->aaa = '123';
        // echo(321);
// // 		Redis::set('key123','value'); //存入redis
// // 　　  　Redis::get('key123'); //获取redis中的值
// //     die;

		return view('demo/index');
	}

	public function login(){
       // echo $this->aaa;die;
        
        $input = Input::all();
        $res=$this->Model->getOne($input);
        // var_dump($res);die;
        // var_dump(session());die;
        session()->put('u_id', $res->id);
        // Session::put('u_id',$res->id);
         // echo $id;die;
        if($res){
            echo '<script>alert("登陆成功");location.href="'.'demo_schedule_add'.'";</script>';
        }else{
            echo '<script>alert("账号或密码错误");location.href="'.'demo_index'.'";</script>';
        }
    }

    public function schedule_add(){
    	
       		$u_id=session('u_id');
		    return view('demo/schedule_add',['u_id'=>$u_id]);
    }

    public function schedule_add_do(){
        	$data = Input::all();
        	// var_dump($data);
        	$add_res=$this->Model->add_sj($data);
        	if($add_res){

                $this->red = $this->demo_redis($add_res);
                $red_data=$this->red;

                // print_r($red_data);die;

        		echo '<script>alert("记录成功");</script>';

        	}else{
                echo '<script>alert("记录失败");location.href="'.'demo_index'.'";</script>';

            }

    }

    public function demo_redis($id){
    	 $data_one=$this->Model->getRow($id);
         $data_one =get_object_vars($data_one);
         if($data_one['status'] == '1'){
             $str=json_encode($data_one);

             // $db= new \redis();

             Redis::lpush('richeng',$str);

             // $db->connect('127.0.0.1',6379);
             // var_dump($res);die;
             // $db->lpush('richeng',$str);
                        //rpop 取队列
             // echo $db->get('richeng');die;
             return 'yes';
            // $str='';
            // $str.=$data_one['u_id'].','.$data_one['content'].'-'.$data_one['add_time'];
            // $str = '"'.$str.'"';
            // print_r($str);die;
            // echo $str;die;
            // $aa=json_decode($str);
            // print_r($aa);die;
        // Redis::set('richeng',$str); //存入redis 
     // 　　  　Redis::get('key123'); //获取redis中的值
          }else{
            return 'no';
          }
	    // var_dump($redis);
    	 
    }

  


}



 ?>