<?php

/**
 * This is the model class for table "{{cost_float}}".
 *
 * The followings are the available columns in table '{{cost_float}}':
 * @property string $id
 * @property string $id_game
 * @property string $id_place
 * @property integer $time_start
 * @property integer $time_finish
 * @property string $day
 * @property string $description
 * @property string $ts_create
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Game $idGame
 * @property Place $idPlace
 */
class CostFloat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{cost_float}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_game, id_place, time_start, time_finish, ts_create', 'required'),
			array('time_start, time_finish, active', 'numerical', 'integerOnly'=>true),
			array('id_game, id_place', 'length', 'max'=>11),
			array('ts_create', 'length', 'max'=>20),
			array('day, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_game, id_place, time_start, time_finish, day, description, ts_create, active', 'safe', 'on'=>'search'),
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
			'idGame' => array(self::BELONGS_TO, 'Game', 'id_game'),
			'idPlace' => array(self::BELONGS_TO, 'Place', 'id_place'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_game' => 'Id Game',
			'id_place' => 'Id Place',
			'time_start' => 'Time Start',
			'time_finish' => 'Time Finish',
			'day' => 'Day',
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
		$criteria->compare('id_game',$this->id_game,true);
		$criteria->compare('id_place',$this->id_place,true);
		$criteria->compare('time_start',$this->time_start);
		$criteria->compare('time_finish',$this->time_finish);
		$criteria->compare('day',$this->day,true);
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
	 * @return CostFloat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
