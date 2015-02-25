<?php

/**
 * This is the model class for table "{{employee2place}}".
 *
 * The followings are the available columns in table '{{employee2place}}':
 * @property string $id
 * @property string $id_employee
 * @property string $id_place
 * @property string $description
 * @property string $day_work
 * @property string $shift_work
 * @property integer $salary_at_hour
 * @property integer $salary_rate
 * @property integer $salary_at_shift
 * @property string $ts_create
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Employee $idEmployee
 * @property Place $idPlace
 */
class Employee2place extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{employee2place}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_employee, id_place, salary_at_hour, salary_rate, ts_create', 'required'),
			array('salary_at_hour, salary_rate, salary_at_shift, active', 'numerical', 'integerOnly'=>true),
			array('id_employee, id_place', 'length', 'max'=>11),
			array('shift_work', 'length', 'max'=>50),
			array('ts_create', 'length', 'max'=>20),
			array('description, day_work', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_employee, id_place, description, day_work, shift_work, salary_at_hour, salary_rate, salary_at_shift, ts_create, active', 'safe', 'on'=>'search'),
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
			'idEmployee' => array(self::BELONGS_TO, 'Employee', 'id_employee'),
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
			'id_employee' => 'Id Employee',
			'id_place' => 'Id Place',
			'description' => 'Description',
			'day_work' => 'Day Work',
			'shift_work' => 'Shift Work',
			'salary_at_hour' => 'Salary At Hour',
			'salary_rate' => 'Salary Rate',
			'salary_at_shift' => 'Salary At Shift',
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
		$criteria->compare('id_employee',$this->id_employee,true);
		$criteria->compare('id_place',$this->id_place,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('day_work',$this->day_work,true);
		$criteria->compare('shift_work',$this->shift_work,true);
		$criteria->compare('salary_at_hour',$this->salary_at_hour);
		$criteria->compare('salary_rate',$this->salary_rate);
		$criteria->compare('salary_at_shift',$this->salary_at_shift);
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
	 * @return Employee2place the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
