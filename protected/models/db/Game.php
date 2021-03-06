<?php

/**
 * This is the model class for table "{{game}}".
 *
 * The followings are the available columns in table '{{game}}':
 * @property string $id
 * @property string $name
 * @property integer $duration
 * @property string $description
 * @property string $version
 * @property string $ts_create
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property CostFloat[] $costFloats
 * @property Game2place[] $game2places
 * @property Play[] $plays
 */
class Game extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{game}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, duration', 'required'),
			array('duration, active', 'numerical', 'integerOnly'=>true),
			array('name, version', 'length', 'max'=>50),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, duration, description, version, ts_create, active', 'safe', 'on'=>'search'),
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
			'costFloats' => array(self::HAS_MANY, 'CostFloat', 'id_game'),
			'game2places' => array(self::HAS_MANY, 'Game2place', 'id_game'),
			'plays' => array(self::HAS_MANY, 'Play', 'id_game'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'duration' => 'Duration',
			'description' => 'Description',
			'version' => 'Version',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('version',$this->version,true);
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
	 * @return Game the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
