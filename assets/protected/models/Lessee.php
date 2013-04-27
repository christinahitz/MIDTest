<?php

/**
 * This is the model class for table "lessee".
 *
 * The followings are the available columns in table 'lessee':
 * @property integer $userID
 * @property string $address
 * @property string $homePhone
 * @property string $mobilePhone
 * @property integer $homeDealer
 * @property string $discount
 * @property string $Comment
 * @property string $removeDate
 *
 * The followings are the available model relations:
 * @property Appointment[] $appointments
 * @property Invoice[] $invoices
 * @property Servicecenter $_homeDealer
 * @property User $user
 */
class Lessee extends CActiveRecord
{   
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $home_dealer;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lessee the static model class
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
		return 'lessee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('address, Comment', 'length', 'max'=>255),
			array('homePhone, mobilePhone', 'length', 'max'=>25),
			array('discount', 'length', 'max'=>10),
			array('removeDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, first_name, last_name, email, home_dealer, userID, address, homePhone, mobilePhone, homeDealer, discount, Comment, removeDate', 'safe', 'on'=>'search'),
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
			'appointments' => array(self::HAS_MANY, 'Appointment', 'custID'),
			'invoices' => array(self::HAS_MANY, 'Invoice', 'lesseeID'),
			'_homeDealer' => array(self::BELONGS_TO, 'Servicecenter', 'homeDealer'),    // name collision, should have made column name homeDealerID
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
			'address' => 'Address',
			'homePhone' => 'Home Phone',
			'mobilePhone' => 'Mobile Phone',
			'homeDealer' => 'Home Dealer',
			'discount' => 'Discount',
			'Comment' => 'Comment',
			'removeDate' => 'Remove Date',
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
                $criteria->with = array('user','_homeDealer');
                
                $criteria->addSearchCondition("user.username",$this->userID);
                $criteria->addSearchCondition("user.fName",$this->userID);
                $criteria->addSearchCondition("user.lName",$this->userID);
                $criteria->addSearchCondition("user.email",$this->userID);
                
//                $criteria->addSearchCondition("_homeDealer.name",$this->homeDealer);

                $criteria->compare('user.username', $this->username, true);
                $criteria->compare('user.fName', $this->first_name, true);
                $criteria->compare('user.lName', $this->last_name, true);
                $criteria->compare('user.email', $this->email, true);
                
//                $criteria->compare('_homeDealer.name', $this->home_dealer, true);
                
		$criteria->compare('userID',$this->userID);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('homePhone',$this->homePhone,true);
		$criteria->compare('mobilePhone',$this->mobilePhone,true);
		$criteria->compare('discount',$this->discount,true);
		$criteria->compare('Comment',$this->Comment,true);
		$criteria->compare('removeDate',$this->removeDate,true);
//		$criteria->compare('homeDealer',$this->homeDealer);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                    'sort'=>array(
                        'attributes'=>array(
                            'username'=>array(
                                'asc'=>'user.username',
                                'desc'=> 'user.username DESC',
                            ),
                            'first_name'=>array(
                                'asc'=>'user.fName',
                                'desc'=> 'user.fName DESC',
                            ),
                            'last_name'=>array(
                                'asc'=>'user.lName',
                                'desc'=> 'user.lName DESC',
                            ),
                            '*',
                        ),
                    ),
		));
	}
}