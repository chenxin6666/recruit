<?php
/**
 * 后台管理员表模型
 */
namespace app\models;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "resource".
 *
 * @property integer $id
 * @property string $texture
 * @property string $mark
 * @property string $manufacturers
 * @property integer $price
 */
class Admin extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

}
