<?php

/**
 * This is the model class for table "appointment".
 *
 * The followings are the available columns in table 'appointment':
 * @property integer $appID
 * @property integer $servCenterID
 * @property integer $custID
 * @property string $date
 * @property string $comment
 *
 * The followings are the available model relations:
 * @property Servicecenter $servCenter
 * @property Lessee $cust
 */
class Appointment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Appointment the static model class
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
		return 'appointment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('servCenterID, custID', 'numerical', 'integerOnly'=>true),
			array('comment', 'length', 'max'=>255),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('appID, servCenterID, custID, date, comment', 'safe', 'on'=>'search'),
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
			'servCenter' => array(self::BELONGS_TO, 'Servicecenter', 'servCenterID'),
			'cust' => array(self::BELONGS_TO, 'Lessee', 'custID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'appID' => 'App',
			'servCenterID' => 'Serv Center',
			'custID' => 'Cust',
			'date' => 'Date',
			'comment' => 'Comment',
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

		$criteria->compare('appID',$this->appID);
		$criteria->compare('servCenterID',$this->servCenterID);
		$criteria->compare('custID',$this->custID);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}