<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;


class SignupForm extends Model {
	public $username;
  	public $password;
  	public $password_repeat;
  
  	public function rules(){
    	return [
        	[['username', 'password', 'password_repeat'], 'required'],
          	[['username', 'password', 'password_repeat'], 'trim'],
          	['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>'Пароль не совпадает'],
          	['password', 'string', 'min'=>6],
          	['username', 'unique', 'targetClass'=>'\app\models\User', 'message'=>'Пользователь с таким логином существует'],
        ];
    }
  
  	public function signup(){
      
      if(!$this->validate()){
        return null;
      }
      
      $user = new User();
      $user->username = $this->username;
      $user->setPassword($this->password);
      $user->generateAuthKey();
      return $user->save() ? $user : null;
    }
}

?>