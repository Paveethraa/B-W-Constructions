<?php

namespace app\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property integer $user_role_id
 * @property string $created_date
 * @property string $created_by
 *
 * @property UserRole $userRole
 * @property UserAccess[] $userAccesses
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 
	  public $username;
   // public $password;
    public $rememberMe = true;

    private $_user = false;
	 
	public $url;
	public $ids;
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           [['user_name', 'user_role_id', 'created_date','password'], 'required'],
            [['user_role_id'], 'integer'],
            [['created_date', 'created_by'], 'safe'],
            [['user_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'user_role_id' => 'User Role ID',
            'created_date' => 'Created Date',
           // 'created_by' => 'Created By',
        ];
    }
	
	
	public function insertRoles()
	{
	echo "insert into user_access (user_id,url_id) values $this->ids";
	$command = Yii::$app->db->createCommand("insert into user_access (user_id,url_id) values $this->ids")
		->execute();
		}
	
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getuser_role()
    {
        return $this->hasOne(UserRole::className(), ['user_role_id' => 'user_role_id']);
    }
	
	
	 public function getpassword()
    {
        return $this->hasOne(UserRole::className(), ['user_role_id' => 'user_role_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAccesses()
    {
        return $this->hasMany(UserAccess::className(), ['user_id' => 'user_id']);
    }
	
	public function verify()
	{
	
		$res=$this::find()->where(['user_name'=>$this->user_name,'password'=>$this->password])->one();
		
		if(!empty($res))
		{
		$query =new Query();
		$query->select(['url_name'])->where(['user_id'=>$res->user_id])->from('user_access')->leftJoin('url','url.url_id=user_access.url_id');
		$sk=$query->createCommand();
		$url=$sk->queryAll();
	foreach($url as $var=>$val)
	{
		foreach($val as $variable=>$value)
		{
			$ass[$variable][]=$value;
			}
		}
		$url=$ass;
		$res->url=$url;
	    
		return $res;
	}
	else
	{
		return false;
		}
	
	}
	
	
	
	
}
