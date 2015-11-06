<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_access".
 *
 * @property integer $user_access_id
 * @property integer $url_id
 * @property integer $user_id
 * @property integer $flag
 *
 * @property Url $url
 * @property User $user
 */
class UserAccess extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_access';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url_id', 'user_id', 'flag'], 'required'],
            [['url_id', 'user_id', 'flag'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_access_id' => 'User Access ID',
            'url_id' => 'Url ID',
            'user_id' => 'User ID',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUrl()
    {
        return $this->hasOne(Url::className(), ['url_id' => 'url_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
