<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $verification
 * @property integer $role
 * @property string $salt
 * @property string $fName
 * @property string $lName
 *
 * The followings are the available model relations:
 * @property Lessee $lessee
 * @property Technician $technician
 * @property Role $role0
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role', 'numerical', 'integerOnly'=>true),
			array('username, fName, lName', 'length', 'max'=>45),
			array('password, email', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, email, role, fName, lName', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'lessee' => array(self::HAS_ONE, 'Lessee', 'userID'),
			'technician' => array(self::HAS_ONE, 'Technician', 'userID'),
			'_role' => array(self::BELONGS_TO, 'Role', 'role'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'User ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'verification' => 'Verification',
			'role' => 'Role',
			'salt' => 'Salt',
			'fName' => 'First Name',
			'lName' => 'Last Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('fName',$this->fName,true);
		$criteria->compare('lName',$this->lName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
        public function validatePassword($password)
        {   // if password is plain text 'password', then use that.  (for bootstrapping)
            if($this->password === 'password')
                {return 'password';}
            else
                {return crypt($password,$this->password)===$this->password;}
        }

        public function hashPassword($password)
        {
            return crypt($password, $this->generateSalt());
        }
}