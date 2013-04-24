<?php

/**
 * This is the model class for table "technician".
 *
 * The followings are the available columns in table 'technician':
 * @property integer $userID
 * @property string $phone
 * @property integer $servCenterID
 *
 * The followings are the available model relations:
 * @property Invoice[] $invoices
 * @property Servicecenter $servCenter
 * @property User $user
 */
class Technician extends CActiveRecord
{    
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $service_center;


    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Technician the static model class
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
		return 'technician';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phone', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, first_name, last_name, email, service_center, userID, phone, servCenterID', 'safe', 'on'=>'search'),
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
			'invoices' => array(self::HAS_MANY, 'Invoice', 'techID'),
			'servCenter' => array(self::BELONGS_TO, 'Servicecenter', 'servCenterID'),
			'user' => array(self::BELONGS_TO, 'User', 'userID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userID' => 'User ID',
			'phone' => 'Phone',
			'servCenterID' => 'Service Center ID',
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
                $criteria->with = array('user','servCenter');
                
                $criteria->addSearchCondition("user.username",$this->userID);
                $criteria->addSearchCondition("user.fName",$this->userID);
                $criteria->addSearchCondition("user.lName",$this->userID);
                $criteria->addSearchCondition("user.email",$this->userID);
                
                $criteria->addSearchCondition("servCenter.name",$this->servCenterID);

                $criteria->compare('user.username', $this->username, true);
                $criteria->compare('user.fName', $this->first_name, true);
                $criteria->compare('user.lName', $this->last_name, true);
                $criteria->compare('user.email', $this->email, true);
                
                $criteria->compare('servCenter.name', $this->service_center, true);
                
		$criteria->compare('userID',$this->userID);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('servCenterID',$this->servCenterID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                    'sort'=>array(
                        'attributes'=>array(
                            'username'=>array(
                                'asc'=>'user.username',
                                'desc'=> 'user.username DESC',
                            ),
                            '*',
                        ),
                    ),
		));
	}
}