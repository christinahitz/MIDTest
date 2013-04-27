<?php
class UserIdentity extends CUserIdentity
{
    private $id;
    private $role;
 
    public function authenticate()
    {
       
        
        $username=strtolower($this->username);
        $user=User::model()->find('LOWER(username)=?',array($username));
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!$user->validatePassword($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->id = $user->id;
            $this->setState('roles', $user->_role->roleName);     
            $this->username = $user->username;
            $this->role = $user->_role->roleName;
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode==self::ERROR_NONE;
    }
 
    public function getId(){
        return $this->id;
    }    
}