<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii;
use yii\data\Pagination;
use app\models\Test;
header('content-type:text/html;charset=utf-8');

class ResumeController extends Controller
{

	public $layout = "common";
    public $enableCsrfValidation = false; //禁止表单提交

	//添加简历页面
	public function actionResume_add()
	{
		$session = \YII::$app->session;
        $name = $session->get("username");
		return $this->render('resume_add.html',['name'=>$name]);
	}

	//简历列表页面
	public function actionResume_list()
	{
		$session = \YII::$app->session;
        $name = $session->get("username");
		 if(\Yii::$app->request->post())
	 {
        $post=yii::$app->request->post();
        $rel=\yii::$app->db->createCommand()->insert('resume',$post)->execute();
        // print_r(\Yii::$app->request->post());die;
        if($rel){
          $this->redirect('?r=resume/resume_list');
        }else{
          die("<script>alert('网络错误，添加失败');location.href='?r=resume/resume_add'</script>");
        }
        // echo "post";die;
      }else{
        $query=new \yii\db\Query();
        $info=$query->select(['id','realname','teach','major','sex','address','mobile','email','introduce','experience'])->from('resume')->all();
        return $this->render('resume_list.html',['info'=>$info]);
      }
	}

	
	//简历删除
	public function actionDel()
	{
		$request=\yii::$app->request;
        $con=\yii::$app->db;
        $id=$request->get('id');
        $res=$con->createCommand()->delete('resume',['id'=>$id])->execute();
        if($res){
            die("<script>alert('删除成功');location.href='?r=resume/resume_list'</script>");
        }else{
            die("<script>alert('删除失败');location.href='?r=resume/resume_list'</script>");
        }

	}

	//简历修改页面
	public function actionRevise()
	{
		$request=\yii::$app->request;
		$id=$request->get('id');
		$query=new \yii\db\Query();
		$info=$query->select(['id','realname','teach','major','sex','address','mobile','email','introduce','experience'])->from('resume')->where('id='.$id)->one();
		// print_r($info);die;
        return $this->render('revise.html',['info'=>$info]);
	}

	//修改简历
	public function actionUpdate()
	{
		$request=\yii::$app->request;
        $con=\yii::$app->db;
        $data=$request->post();
        //var_dump($data);die;
        $query=new \yii\db\Query();
        $res=$con->createCommand()->update('resume',['realname'=>$data['realname'],'teach'=>$data['teach'],'major'=>$data['major'],'sex'=>$data['sex'],'address'=>$data['address'],'mobile'=>$data['mobile'],'email'=>$data['email'],'introduce'=>$data['introduce'],'experience'=>$data['experience']],['id'=>$data['u_id']])->execute();
        // print_r(\Yii::$app->request->post());die;
        if($res){
          $this->redirect('?r=resume/resume_list');
        }else{
          die("<script>alert('网络错误，修改失败');location.href='?r=resume/revise'</script>");
        }
	}
}

?>