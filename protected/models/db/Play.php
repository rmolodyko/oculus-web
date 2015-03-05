<?php

/**
 * This is the model class for table "{{play}}".
 *
 * The followings are the available columns in table '{{play}}':
 * @property string $id
 * @property string $id_bind
 * @property string $id_game
 * @property string $ts
 * @property integer $duration
 *
 * The followings are the available model relations:
 * @property Game $idGame
 * @property Employee2place $idBind
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
			array('id_bind, id_game, ts, duration', 'required'),
			//array('duration', 'numerical', 'integerOnly'=>true),
			array('id_bind, id_game', 'length', 'max'=>11),
			array('ts', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_bind, id_game, ts, duration', 'safe', 'on'=>'search'),
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
			'idBind' => array(self::BELONGS_TO, 'Employee2place', 'id_bind'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_bind' => 'Id Bind',
			'id_game' => 'Id Game',
			'ts' => 'Ts',
			'duration' => 'Продолжительность воспроизведения видео в секундах',
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
		$criteria->compare('id_bind',$this->id_bind,true);
		$criteria->compare('id_game',$this->id_game,true);
		$criteria->compare('ts',$this->ts,true);
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
