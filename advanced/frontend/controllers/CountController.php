<?php

namespace frontend\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class CountController extends  Controller{




    public function actionIndex(){
        $file="http://www.localhost.com/log.txt";
        $content = file_get_contents($file); //读取文件中的内容

        //echo $content;die;
        //$reg="#\[20/Feb/2009:(.*)\-.*]#isU";
        $reg="#\[.*/2009:(.*)\-.*]#isU";
        preg_match_all($reg,$content,$arr);
        //var_dump($arr[1]);

        $brr=array();
        $count=count($arr[1]);

        for($i=0;$i<1440;$i+=10){
            $crr=array();
            //echo $i;
            $a=floor($i/60).':'.($i%60).':00';
            $b=floor(($i+10)/60).':'.(($i+10)%60).':00';
            $c=$a.'--'.$b;
            $crr[]=$c;
            $sum=0;
            foreach($arr[1] as $val){
                $reg1="#(.*):(.*):(.*)#is";
                preg_match($reg1,$val,$arr2);
                //var_dump($arr2);die;
                $val=$arr2[1]*60+$arr2[2];
                //var_dump($val);die;
                if($val>$i&&$val<=$i+10){
                    $sum+=1;
                }
            }

            $crr[]=$sum;
            $d=($sum/$count*100).'%';
            $crr[]=$d;
            $brr[]=$crr;

        }
        $f=0;
        foreach($brr as $v){
            $f+=$v[1];
        }

        return $this->render('list.html',array('brr'=>$brr,'f'=>$f));

    }

}