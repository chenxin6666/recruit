<?php
/**
 * 留言板模型
 */
namespace App;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //定义表名
    protected $table = 'message';
    public $timestamps = false;
}
