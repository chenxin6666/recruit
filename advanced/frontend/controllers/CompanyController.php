<?php
/*企业管理*/
namespace frontend\controllers;

use Yii;
use app\models\Company;
use app\models\ComCategory;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

header("Content-type:text/html;charset=utf-8");
class CompanyController extends CommonController
{
    public $enableCsrfValidation = false; //禁止表单提交


    /*添加企业*/
    public function actionCompany_add()
    {
        //是否是post传值
        if(\Yii::$app->request->post()){
            $Company = new Company();
            $com = \Yii::$app->request;

            //时间
            $time = date('Y-m-d H:i:s');

            //接值
            $Company->com_name = $com->post('com_name');
            $Company->com_email = $com->post('com_email');
            $Company->com_address = $com->post('com_address');
            $Company->com_profile = $com->post('com_profile');
            $Company->com_time = $time;
            $result = $Company->save();

            if($result){
                $this->redirect('?r=company/company_list');
            }else{
                die("<script>alert('注册失败');location.href='?r=company/company_add'</script>");
            }

        }else{
            $arr = ComCategory::find();
            $str = $arr->select('cate_id,cate_name,parent_id')
                        ->from('com_category')
                        ->asArray()
                        ->all();
            $info = $this->recursion($str);
            return $this->render('company_add.html',['com_category'=>$info]);
        }
    }

    //展示页面
    public function actionCompany_list()
    {
        $arr = company::find();
        $str = $arr->select('*')
            ->from('company')
            ->asArray()
            ->all();
        return $this->render('company_list.html',['str'=>$str]);
    }

    //所在地区
    public function actionCompany_area()
    {
        //接值
        $area_id = \Yii::$app->request->get('area_id');
        $query = new Query();
        $info = $query->select(['area_id','area_name'])
            ->from('region')
            ->where(['parent_id'=>$area_id])
            ->all();
        echo json_encode($info);
    }

     /**
     * 无线递归
     */
    public function recursion($data,$pid=0,$level=0){
      static $arr;
      foreach($data as $key=>$val){
        if($pid==$val['parent_id']){
          $val['level'] = $level;
          $val['_html'] = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$level*2);
          $arr[]=$val;
          $this->recursion($data,$val['cate_id'],$level+1);
        }
      }
      return $arr;
    }
}