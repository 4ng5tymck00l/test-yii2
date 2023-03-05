<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
  	public static function tableName(){
    	return '{{%user}}';
    }


    public static function findIdentity($id)
    {
        return static::findOne(['id'=>$id]);
    }

  
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException("Token is not implemented");
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username'=>$username]);
    }


    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
      return Yii::$app->security->validatePassword($password, $this->password_hash);
     
    }
  	
  	public function setPassword($password){
    	$this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
  
  	public function generateAuthKey(){
    	$this->auth_key = Yii::$app->security->generateRandomString();
    }
  
}