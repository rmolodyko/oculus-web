<?php

/**
 * This is the model class for table "{{play}}".
 *
 * The followings are the available columns in table '{{play}}':
 * @property string $id
 * @property string $id_place
 * @property string $id_game
 * @property string $email
 * @property string $ts_create
 * @property integer $duration
 *
 * The followings are the available model relations:
 * @property Game $idGame
 * @property Place $idPlace
 */
class Play extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{play}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_place, id_game, email, ts_create, duration', 'required'),
			array('duration', 'numerical', 'integerOnly'=>true),
			array('id_place, id_game', 'length', 'max'=>11),
			array('email', 'length', 'max'=>50),
			array('ts_create', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_place, id_game, email, ts_create, duration', 'safe', 'on'=>'search'),
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
			'id_place' => 'Id Place',
			'id_game' => 'Id Game',
			'email' => 'Email',
			'ts_create' => 'Ts Create',
			'duration' => 'Duration',
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
		$criteria->compare('id_place',$this->id_place,true);
		$criteria->compare('id_game',$this->id_game,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('ts_create',$this->ts_create,true);
		$criteria->compare('duration',$this->duration);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Play the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
