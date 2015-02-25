<?php

/**
 * This is the model class for table "{{place}}".
 *
 * The followings are the available columns in table '{{place}}':
 * @property string $id
 * @property string $id_city
 * @property string $name
 * @property string $address
 * @property string $description
 * @property string $ts_create
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property CostFloat[] $costFloats
 * @property Employee2place[] $employee2places
 * @property Game2place[] $game2places
 * @property City $idCity
 * @property Play[] $plays
 * @property SessionEmployee[] $sessionEmployees
 */
class Place extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{place}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_city, name, address', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('id_city', 'length', 'max'=>11),
			array('name', 'length', 'max'=>50),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_city, name, address, description, ts_create, active', 'safe', 'on'=>'search'),
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
			'costFloats' => array(self::HAS_MANY, 'CostFloat', 'id_place'),
			'employee2places' => array(self::HAS_MANY, 'Employee2place', 'id_place'),
			'game2places' => array(self::HAS_MANY, 'Game2place', 'id_place'),
			'idCity' => array(self::BELONGS_TO, 'City', 'id_city'),
			'plays' => array(self::HAS_MANY, 'Play', 'id_place'),
			'sessionEmployees' => array(self::HAS_MANY, 'SessionEmployee', 'id_place'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_city' => 'Id City',
			'name' => 'Name',
			'address' => 'Address',
			'description' => 'Description',
			'ts_create' => 'Ts Create',
			'active' => 'Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_city',$this->id_city,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('ts_create',$this->ts_create,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Place the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
