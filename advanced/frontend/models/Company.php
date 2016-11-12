<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "resource".
 *
 * @property integer $id
 * @property string $texture
 * @property string $mark
 * @property string $manufacturers
 * @property integer $price
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Company';
    }
}