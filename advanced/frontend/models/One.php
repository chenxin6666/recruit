<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "liyang".
 *
 * @property integer $u_id
 * @property string $username
 * @property string $pwd
 */
class One extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'liyang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'pwd'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'username' => 'Username',
            'pwd' => 'Pwd',
        ];
    }
}
