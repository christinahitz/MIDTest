<?php

/**
 * This is the model class for table "device".
 *
 * The followings are the available columns in table 'device':
 * @property integer $deviceID
 * @property string $serialNum
 * @property string $type
 * @property string $lastCal
 * @property string $lastServ
 * @property string $lastDraegerServ
 * @property integer $leased
 * @property integer $locationID
 *
 * The followings are the available model relations:
 * @property Invoice[] $invoices
 * @property Invoice[] $invoices1
 */
class Device extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Device the static model class
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
		return 'device';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deviceID, serialNum', 'required'),
			array('deviceID, leased, locationID', 'numerical', 'integerOnly'=>true),
			array('serialNum, type', 'length', 'max'=>45),
			array('lastCal, lastServ, lastDraegerServ', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('deviceID, serialNum, type, lastCal, lastServ, lastDraegerServ, leased, locationID', 'safe', 'on'=>'search'),
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
			'invoices' => array(self::HAS_MANY, 'Invoice', 'handsetID'),
			'invoices1' => array(self::HAS_MANY, 'Invoice', 'controlboxID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'deviceID' => 'Device',
			'serialNum' => 'Serial Num',
			'type' => 'Type',
			'lastCal' => 'Last Cal',
			'lastServ' => 'Last Serv',
			'lastDraegerServ' => 'Last Draeger Serv',
			'leased' => 'Leased',
			'locationID' => 'Location',
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

		$criteria->compare('deviceID',$this->deviceID);
		$criteria->compare('serialNum',$this->serialNum,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('lastCal',$this->lastCal,true);
		$criteria->compare('lastServ',$this->lastServ,true);
		$criteria->compare('lastDraegerServ',$this->lastDraegerServ,true);
		$criteria->compare('leased',$this->leased);
		$criteria->compare('locationID',$this->locationID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}