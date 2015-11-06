<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "url".
 *
 * @property integer $url_id
 * @property string $url_name
 * @property integer $flag
 *
 * @property UserAccess[] $userAccesses
 */
class Url extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url_id', 'url_name', 'flag'], 'required'],
            [['url_id', 'flag'], 'integer'],
            [['url_name'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'url_id' => 'Url ID',
            'url_name' => 'Url Name',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAccesses()
    {
        return $this->hasMany(UserAccess::className(), ['url_id' => 'url_id']);
    }
}
