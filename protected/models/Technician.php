<?php

/**
 * This is the model class for table "technician".
 *
 * The followings are the available columns in table 'technician':
 * @property integer $userID
 * @property string $fName
 * @property string $lName
 * @property string $phone
 * @property integer $servCenterID
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Invoice[] $invoices
 * @property Servicecenter $servCenter
 * @property User $user
 */
class Technician extends CActiveRecord
{
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
			array('userID', 'required'),
			array('userID, servCenterID', 'numerical', 'integerOnly'=>true),
			array('fName, lName', 'length', 'max'=>45),
			array('phone', 'length', 'max'=>25),
			array('email', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userID, fName, lName, phone, servCenterID, email', 'safe', 'on'=>'search'),
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
			'userID' => 'User',
			'fName' => 'F Name',
			'lName' => 'L Name',
			'phone' => 'Phone',
			'servCenterID' => 'Serv Center',
			'email' => 'Email',
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
		$criteria->compare('fName',$this->fName,true);
		$criteria->compare('lName',$this->lName,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('servCenterID',$this->servCenterID);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}