<?php
/**
 * 职位
 */
namespace frontend\controllers;
use yii\web\Controller;
use yii;
use yii\data\Pagination;
use app\models\PosCategory;

header("Content-type:text/html;charset=utf-8");
class PositionController extends Controller
{
    public $layout = "common";     //引用common的公共头部
    public $enableCsrfValidation = false; //禁止表单提交

    
    /**
     * 显示增加职位分类的页面
     * @return [type] [description]
     */
    public function actionPosition_add(){
      //判断是不是post传值
      if(\Yii::$app->request->post()){
        $poscategory = new PosCategory;
        $re = \Yii::$app->request;
        // print_r(\Yii::$app->request->post());die;
        $poscategory->cate_name = $re->post('cate_name');
        $poscategory->parent_id = $re->post('parent_id');
        $poscategory->sort      = $re->post('sort');
        $result = $poscategory->save();
        if($result){
          $this->redirect('?r=position/position_list');
        }else{
          die("<script>alert('网络错误，添加失败');location.href='?r=position/position_add'</script>");
        }
        // echo "post";die;
      }else{
        $arr = PosCategory::find();
        $str = $arr->select('*')
                  ->from('pos_category')
                  ->asArray()
                  ->all();
        $cate_id = array_column($str,'cate_id');
        $cate_name = array_column($str,'cate_name');
        $category = array_combine($cate_id, $cate_name);

        return $this->render('position_add.html',['category'=>$category]);
      }
      
    }
    public function actionPosition_list(){
         $arr = PosCategory::find();
         $str = $arr->select('*')
                    ->from('pos_category')
                    ->asArray()
                    ->all();
         $cate_info = $this->recursion($str);
         // print_r($cate_info);die;
         // $sort = array_column($str,'sort');
         // $cate_name = array_column($str,'cate_name');
         // $cate_id = array_column($str,'cate_id');
         // $category = array_combine($cate_id,$cate_name);
         // echo "<pre>";
         // print_r($str);die;
         // print_r($str);die;
         return $this->render('position_list.html',['category'=>$cate_info]);
         
    }

    /**
   * 无线递归
   */
  function recursion($data,$pid=0,$level=0){
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

?>