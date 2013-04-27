<?php

/**
 * This is the model class for table "invoice".
 *
 * The followings are the available columns in table 'invoice':
 * @property integer $invoiceNum
 * @property string $serviceDate
 * @property integer $servTypeID
 * @property string $subTotal
 * @property string $total
 * @property integer $lesseeID
 * @property integer $servCenterID
 * @property integer $techID
 * @property integer $handsetID
 * @property integer $controlboxID
 * @property string $comment
 *
 * The followings are the available model relations:
 * @property Servicetype $servType
 * @property Lessee $lessee
 * @property Servicecenter $servCenter
 * @property Technician $tech
 * @property Device $handset
 * @property Device $controlbox
 */
class Invoice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Invoice the static model class
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
		return 'invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('serviceDate, servTypeID, lesseeID', 'required'),
			array('servTypeID, lesseeID, servCenterID, techID, handsetID, controlboxID', 'numerical', 'integerOnly'=>true),
			array('subTotal, total', 'length', 'max'=>5),
			array('comment', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('invoiceNum, serviceDate, servTypeID, subTotal, total, lesseeID, servCenterID, techID, handsetID, controlboxID, comment', 'safe', 'on'=>'search'),
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
			'servType' => array(self::BELONGS_TO, 'Servicetype', 'servTypeID'),
			'lessee' => array(self::BELONGS_TO, 'Lessee', 'lesseeID'),
			'servCenter' => array(self::BELONGS_TO, 'Servicecenter', 'servCenterID'),
			'tech' => array(self::BELONGS_TO, 'Technician', 'techID'),
			'handset' => array(self::BELONGS_TO, 'Device', 'handsetID'),
			'controlbox' => array(self::BELONGS_TO, 'Device', 'controlboxID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'invoiceNum' => 'Invoice Num',
			'serviceDate' => 'Service Date',
			'servTypeID' => 'Serv Type',
			'subTotal' => 'Sub Total',
			'total' => 'Total',
			'lesseeID' => 'Lessee',
			'servCenterID' => 'Serv Center',
			'techID' => 'Tech',
			'handsetID' => 'Handset',
			'controlboxID' => 'Controlbox',
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

		$criteria->compare('invoiceNum',$this->invoiceNum);
		$criteria->compare('serviceDate',$this->serviceDate,true);
		$criteria->compare('servTypeID',$this->servTypeID);
		$criteria->compare('subTotal',$this->subTotal,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('lesseeID',$this->lesseeID);
		$criteria->compare('servCenterID',$this->servCenterID);
		$criteria->compare('techID',$this->techID);
		$criteria->compare('handsetID',$this->handsetID);
		$criteria->compare('controlboxID',$this->controlboxID);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}