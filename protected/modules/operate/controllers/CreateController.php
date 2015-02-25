<?php

class CreateController extends Controller
{
    public $layout = 'menu';
	public function actionCountry()
	{
        $model = new Country;
        if(isset($_POST['ajax']) && $_POST['ajax']==='create-country-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Country'])){
            $model->attributes = $_POST['Country'];
            if($model->validate()){
                $model->save();
                Yii::app()->user->setFlash('status', "Data saved!");
                $this->redirect([]);
            }
        }

		$this->render('country',['model'=>$model]);
    }

    public function actionCity()
    {
        $model = new City;
        if(isset($_POST['ajax']) && $_POST['ajax']==='create-city-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['City'])){
            $model->attributes = $_POST['City'];
            if($model->validate()){
                $model->save();
                Yii::app()->user->setFlash('status', "Data saved!");
                $this->redirect([]);
            }
        }


        $country= Country::model()->findAll();
        $newarray = [];
        foreach($country as $k=>$v){
            $newarray[$v->id] = $v->name;
        }
        $this->render('city',['model'=>$model,'country'=>$newarray]);
    }

    public function actionPlace()
    {
        $model = new Place;
        if(isset($_POST['ajax']) && $_POST['ajax']==='create-place-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Place'])){
            $model->attributes = $_POST['Place'];
            if($model->validate()){
                $model->save();
                Yii::app()->user->setFlash('status', "Data saved!");
                $this->redirect([]);
            }
        }

        $city = City::model()->findAll();
        $newarray = [];
        foreach($city as $k=>$v){
            $newarray[$v->id] = $v->name;
        }
        $this->render('place',['model'=>$model,'city'=>$newarray]);
    }

    public function actionEmployee()
    {
        $model = new Employee;
        if(isset($_POST['ajax']) && $_POST['ajax']==='create-employee-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Employee'])){
            $model->attributes = $_POST['Employee'];
            if($model->validate()){
                $model->save();
                Yii::app()->user->setFlash('status', "Data saved!");
                $this->redirect([]);
            }
        }

        $this->render('employee',['model'=>$model]);
    }

	public function actionGame()
	{
        $model = new Game;
        if(isset($_POST['ajax']) && $_POST['ajax']==='create-game-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Game'])){
            $model->attributes = $_POST['Game'];
            if($model->validate()){
                $model->save();
                Yii::app()->user->setFlash('status', "Data saved!");
                $this->redirect([]);
            }
        }

		$this->render('game',['model'=>$model]);
	}

    public function actionSelect($id_place){
        $employee = Employee2place::model()->findAllByAttributes(["id_place"=>$id_place]);
        $stdClass = new stdClass();
        foreach($employee as $v){
            $stdClass->email[] = Employee::model()->findByPk($v->id_employee)->email;
            $stdClass->id_bind[] = $v->id;
        }
        echo json_encode($stdClass);
    }
}