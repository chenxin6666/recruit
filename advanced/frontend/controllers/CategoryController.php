<?php
/**
 * 职位
 */
namespace frontend\controllers;
use yii\web\Controller;
use yii;
use yii\data\Pagination;
use app\models\ComCategory;

header("Content-type:text/html;charset=utf-8");
class CategoryController extends Controller
{

    public $enableCsrfValidation = false; //禁止表单提交

    
    /**
     * 显示增加职位分类的页面
     * @return [type] [description]
     */
    public function actionCate_add(){
      //判断是不是post传值
      if(\Yii::$app->request->post()){
        $comObj = new ComCategory;
        $re = \Yii::$app->request;
        // print_r(\Yii::$app->request->post());die;
        $comObj->cate_name = $re->post('cate_name');
        $comObj->sort      = $re->post('sort');
        $comObj->parent_id = $re->post('parent_id');
        // print_r($re->post());die;
        $result = $comObj->save();
        if($result){
          $this->redirect('?r=category/cate_list');
        }else{
          die("<script>alert('网络错误，添加失败');location.href='?r=category/cate_add'</script>");
        }
        // echo "post";die;
      }else{
        $arr = ComCategory::find();
        $str = $arr->select('*')
                  ->from('com_category')
                  ->asArray()
                  ->all();
        $category = $this->recursion($str);
        // $cate_id = array_column($str,'cate_id');
        // $cate_name = array_column($str,'cate_name');
        // $category = array_combine($cate_id, $cate_name);

        return $this->render('cate_add.html',['category'=>$category]);
      }
      
    }
    /**
     * 分类列表
     * @return [type] [description]
     */
    public function actionCate_list(){
         $arr = ComCategory::find();
         $pages = new Pagination([
            'totalCount'=>$arr->count(),//总记录数
            'pageSize'=>10            //每页显示的条数
         ]);
         $str = $arr->select('*')
                    ->from('com_category')
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->asArray()
                    ->all();

         $cate_info = $this->recursion($str);
         // print_r($cate_info);die;
         return $this->render('cate_list.html',['category'=>$cate_info,'pages'=>$pages]);
         
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

  /**
   * 修改
   */
  public function actionPosition_modify(){
    $request = \YII::$app->request; //全局变量 YII
    $id  =  $request->post('id'); //get传值
    $val =  $request->post('val'); //get传值
    // echo $id;
    // echo $val;die;
    $res = \Yii::$app->db->createCommand("UPDATE pos_category SET `cate_name`='$val' WHERE cate_id=".$id)->execute();
    if($res){
      echo "ok";
    }else{
      echo "no";
    }
  }

  /**
   * 删除
   * @param   id  int
   * @return  void()
   */
  public function actionCate_del(){
    $request = \YII::$app->request; //全局变量 YII
    $id =  $request->get('id'); //get传值
    //判断该分类下有没有子级分类
    $arr = ComCategory::find();
    $str = $arr->select('cate_id')
              ->from('com_category')
              ->where(['parent_id'=>"$id"])
              ->asArray()
              ->all();
    if(empty($str)){
        $res = ComCategory::deleteAll('cate_id=:id',array(':id'=>$id));
        if($res){
          echo "ok";
          // $this->redirect('?r=position/position_list');
        }else{
          echo "no";
          die("<script>alert('对不起，网络错误');location.href='?r=category/cate_list'</script>");
        }
    }else{
        echo 0;
        // die("<script>alert('对不起,该分类下有子级分类');location.href='?r=position/position_list'</script>");
    }
  }
   
}

?>