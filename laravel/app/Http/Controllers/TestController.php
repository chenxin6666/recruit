<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Message;
/**
 * 测试留言板的类
 */
class TestController extends Controller
{
	/**
	 * @name 显示留言板的页面
	 * @return [type] [description]
	 */
    public function index(){
        //查询出留言表的所有数据
        // $data  = Message::all(); //查询所有数据
        // dd($data);  //用dd打印数据
        // die;
        $info = DB::table('message')->paginate(5); //paginate 分页   每页显示五条数据
        return view('test/index',array('info'=>$info));
    }

    /**
     * @name 添加留言
     * @int  姓名 时间 内容
     * @out  自增id
     */
    public function addMessage(){
    	//实例化模型
    	$msgObj = new Message();
    	//接值
    	$msgObj->name = Input::get('name');
		$msgObj->time = date('Y-m-d H:i:s');
		$msgObj->content = Input::get('content');
		//添加入库
		$res = $msgObj->save();
		if($res){
			return "ok";
		}else{
			return "faild";
		}
    }

    /**
     * @name 删除留言
     * @int id 要删除的id
     */
    public function delMessage(){
        //接收要删除的id
        $id = Input::get('id');
        //判断有没有id传过来
        if(!$id){
            die("对不起，网络错误");
        }
        //根据id删除
        $result = Message::find($id)->delete();
        // dd($msgObj);
        if($result){
            echo "ok";
        }else{
            echo "no";
        }
    }

    /**
     * @name 查询单条
     */
    public function getone(){
        $id = Input::get('id');
        if(!$id){
            die("网络错误！");
        }
        //$info = Message::find($id)->toArray();
        $info = Message::where('id', $id)->get()->toArray();
        return json_encode($info);
    }

    /**
     * @ name 修改留言
     * @ int  $id  要修改的id
     * @ out  int [修改成功的条数]
     */
    public function modifyMessage(){
        $id = input::get("update_id");
        if(!$id){
            die("网络错误！");
        }
        $msgObj = Message::find($id);
        $msgObj->name = Input::get('name');
        $msgObj->time = date("Y-m-d H:i:s");
        $msgObj->content = Input::get('content');
        if($msgObj->save())
        {
           echo "This a message save ok";
        } else{
            echo "faild";
        }
    }

    /**
     * 测试
     */
    public function test(){
        if(1){
            return redirect()->route('test/index');
        }
    }
}
