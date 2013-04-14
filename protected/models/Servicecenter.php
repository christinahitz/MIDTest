<?php

/**
 * This is the model class for table "servicecenter".
 *
 * The followings are the available columns in table 'servicecenter':
 * @property integer $servCenterID
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $zip
 * @property string $phone
 * @property string $website
 * @property string $fax
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Appointment[] $appointments
 * @property Device[] $devices
 * @property Invoice[] $invoices
 * @property Lessee[] $lessees
 * @property Technician[] $technicians
 */
class Servicecenter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Servicecenter the static model class
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
		return 'servicecenter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('servCenterID', 'required'),
			array('servCenterID', 'numerical', 'integerOnly'=>true),
			array('name, address, city, zip, phone, website, fax', 'length', 'max'=>45),
			array('email', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('servCenterID, name, address, city, zip, phone, website, fax, email', 'safe', 'on'=>'search'),
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
			'appointments' => array(self::HAS_MANY, 'Appointment', 'servCenterID'),
			'devices' => array(self::HAS_MANY, 'Device', 'locationID'),
			'invoices' => array(self::HAS_MANY, 'Invoice', 'servCenterID'),
			'lessees' => array(self::HAS_MANY, 'Lessee', 'homeDealer'),
			'technicians' => array(self::HAS_MANY, 'Technician', 'servCenterID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'servCenterID' => 'Serv Center',
			'name' => 'Name',
			'address' => 'Address',
			'city' => 'City',
			'zip' => 'Zip',
			'phone' => 'Phone',
			'website' => 'Website',
			'fax' => 'Fax',
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

		$criteria->compare('servCenterID',$this->servCenterID);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}