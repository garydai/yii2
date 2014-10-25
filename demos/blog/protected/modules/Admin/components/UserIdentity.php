<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{


		$user=User::model()->find('LOWER(username)=?',array(strtolower($this->username)));
		if($user===null)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else if(!$user->validatePassword($this->password))
		{
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else
		{
			echo Yii::app()->admin->isGuest;

			echo 'id='.Yii::app()->admin->getId();
			$this->setState('id', $user->id);
			$this->_id=$user->id;
			echo '-';
			echo Yii::app()->admin->isGuest;

echo 'id='.Yii::app()->admin->getId();
			echo '-';
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
			echo Yii::app()->admin->name;
		}
		return $this->errorCode==self::ERROR_NONE;
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		echo 'a11111111'.$this->_id;
		return $this->_id;
	}
}
