<?php  
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Support\Facades\DB;  
use Sensitive;
class DemoModel extends Model  
{  
    protected $tableName = 'demo_user';
      
    public function getOne($input){
       return  $row=DB::table($this->tableName)->where(['username'=>$input['username'],'pwd'=>$input['pwd']])->first();
    }

    public function add_sj($data){
        unset($data['_token']);
        // print_r($data);die;
        
        $data['content']=$data['content'];
        $data['add_time']=$data['add_time'];
        $data['u_id']=$data['u_id'];
        $data['status']=$data['status'];
        // print_r($data['status']);die;

         return $id = DB::table('demo_content')->insertGetId($data); 

        // return DB::table('demo_content')->insert($data);
    }

     public function add_remind($data){
        // unset($data['_token']);
        // print_r($data);die;
       foreach ($data as $key => $value) {
            $data['content']=$value['content'];
            $data['add_time']=$value['add_time'];
            $data['u_id']=$value['u_id'];
            $data['status']=$value['status'];
            unset($data['content']);
            unset($data['add_time']);
            unset($data['u_id']);
            unset($data['status']);
            $res =  DB::table('demo_remind')->insert($data);   
       }

         return $res;
        // print_r($data);  
        
        // print_r($data['status']);die;

         // return $id = DB::table('demo_remind')->insertGetId($data); 

        // return $data;
    }


    public function showInfo(){
        //查询所有数据
        return DB::table($this->tableName)->get();
    }
    public function delRow($id){
        //删除
        return DB::table($this->tableName)->where(['id'=>$id])->delete();
    }
    public function getRow($id){
        //查询一条数据
        $row=DB::table('demo_content')->where(['id'=>$id])->first();
        return $row;
    }
    
}
?>