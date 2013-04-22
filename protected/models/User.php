<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $userID
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $verification
 * @property string $role
 *
 * The followings are the available model relations:
 * @property Lessee $lessee
 * @property Technician $technician
 */
class User extends CActiveRecord
{
    public $password;
    public $password_repeat;
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
                        array('username', 'required'),
                        array('username', 'unique'),
                        array('password, password_repeat', 'required'),
                     	array('username, role', 'length', 'max'=>45),
			array('password, email, verification', 'length', 'max'=>255),
                        array('password', 'compare', 'compareAttribute' => 'password_repeat'),
                       
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userID, username, password, email, verification, role', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userID' => 'User',
			'username' => 'Username',
			'password' => 'Password',
                        'password' => "Password Repeat",
			'email' => 'Email',
			'verification' => 'Verification',
			'role' => 'Role',
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

		$criteria->compare('userID',$this->userID);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('verification',$this->verification,true);
		$criteria->compare('role',$this->role,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function hash($value)
        {
            return crypt($value);
        }
        
        protected function beforeSave()
        {
            if (parent::beforeSave()){
                $this->password = $this->hash($this->password);
            return true;
        }
        return false;
        }
        
        public function check($value){
            $hash = crypt($value, $this->password);
            if ($hash == $this->password) {
                return true;
            }
            return false;
        }
        
        public function passwordStrengthOk($attribute, $params)
        {
            //default to true
            $value = true;
            // at least one number
            $valid = $valid && preg_match('/.*[\d].*/',$this->$attribute);
            // at least one non-word character
            $valid = $valid && preg_match('/.*W.*/', $this-$attribute);
            // at least one capital letter
            $valid = $valid && preg_match('/.*[A-Z.*/', $this->$attribute);
            if (!$valid)$this->addError($attribute, "Does not meet password requirements.");
            return $valid;           
        
        }
}