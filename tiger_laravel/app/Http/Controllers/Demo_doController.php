<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// 接值Input
use Illuminate\Support\Facades\Input;
// 引入model
use App\Http\Models\DemoModel;


use Illuminate\Support\Facades\Redis;


use Sensitive;



class Demo_doController extends Controller{

    // public $raa;
	public $Model; 
	public function __construct()
	{
		$this->Model= new DemoModel();
		// var_dump($this->Model);die;
	}


	public function rpop_redis(){
    

        $db= new \redis();
        $db->connect('127.0.0.1',6379);
             // var_dump($res);die;

		for ($i=0; $i < 100 ; $i++) { 
            // if($db->rpop('richeng')){
                 $data[] = $db->rpop('richeng');  
            // }
        }
        $data=array_filter($data);

        $new_data=array();
        foreach ($data as $key => $value) {
            $new_data[]=get_object_vars(json_decode($value));
        }

        $add_remind_res = $this->Model->add_remind($new_data);
        // print_r($add_remind_res);

        
	}



	

  


}



 ?>