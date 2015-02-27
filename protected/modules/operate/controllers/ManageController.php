<?php

class ManageController extends Controller
{
    public $layout = 'menu';
	public function actionCountry($id = null)
	{
        if(($id != null)&&(((int)$id) > 0)){
            $model = Country::model()->findByPk((int)$id);
            if($model == null)
               throw new CHttpException(404,"Not page with id = $id");
        }else{
            $model = new Country;
        }

        if(isset($_POST['ajax']) && $_POST['ajax']==='create-country-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Country'])){
            $model->attributes = $_POST['Country'];
            if($model->validate()){
                $model->save();
                Yii::app()->user->setFlash('status', "Data saved!");
                $this->refresh();
            }
        }

		$this->render('country',['model'=>$model]);
    }

    public function actionCity($id = null)
    {

        if(($id != null)&&(((int)$id) > 0)){
            $model = City::model()->findByPk((int)$id);
            if($model == null)
                throw new CHttpException(404,"Not page with id = $id");
        }else{
            $model = new City;
        }

        if(isset($_POST['ajax']) && $_POST['ajax']==='create-city-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['City'])){
            $model->attributes = $_POST['City'];
            if($model->validate()){
                $model->save();
                Yii::app()->user->setFlash('status', "Data saved!");
                $this->refresh();
            }
        }


        $country= Country::model()->findAll();
        $newarray = [];
        foreach($country as $k=>$v){
            $newarray[$v->id] = $v->name;
        }
        $this->render('city',['model'=>$model,'country'=>$newarray]);
    }

    public function actionPlace($id = null)
    {
        if(($id != null)&&(((int)$id) > 0)){
            $model = Place::model()->findByPk((int)$id);
            if($model == null)
                throw new CHttpException(404,"Not page with id = $id");
        }else{
            $model = new Place;
        }
        if(isset($_POST['ajax']) && $_POST['ajax']==='create-place-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Place'])){
            $model->attributes = $_POST['Place'];
            if($model->validate()){
                $model->save();
                Yii::app()->user->setFlash('status', "Data saved!");
                $this->refresh();
            }
        }

        $city = City::model()->findAll();
        $newarray = [];
        foreach($city as $k=>$v){
            $newarray[$v->id] = $v->name;
        }
        $this->render('place',['model'=>$model,'city'=>$newarray]);
    }

    public function actionEmployee($id = null)
    {
        if(($id != null)&&(((int)$id) > 0)){
            $model = Employee::model()->findByPk((int)$id);
            if($model == null)
                throw new CHttpException(404,"Not page with id = $id");
        }else{
            $model = new Employee;
        }
        if(isset($_POST['ajax']) && $_POST['ajax']==='create-employee-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Employee'])){
            $model->attributes = $_POST['Employee'];
            if($model->validate()){
                $model->save();
                Yii::app()->user->setFlash('status', "Data saved!");
                $this->refresh();
            }
        }

        $this->render('employee',['model'=>$model]);
    }

	public function actionGame($id = null)
	{
        if(($id != null)&&(((int)$id) > 0)){
            $model = Game::model()->findByPk((int)$id);
            if($model == null)
                throw new CHttpException(404,"Not page with id = $id");
        }else{
            $model = new Game;
        }
        if(isset($_POST['ajax']) && $_POST['ajax']==='create-game-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Game'])){
            $model->attributes = $_POST['Game'];
            if($model->validate()){
                $model->save();
                Yii::app()->user->setFlash('status', "Data saved!");
                $this->refresh();
            }
        }

		$this->render('game',['model'=>$model]);
	}
    public function actionCostFloat($id = null)
    {
        if(($id != null)&&(((int)$id) > 0)){
            $model = CostFloat::model()->findByPk((int)$id);
            if($model == null)
                throw new CHttpException(404,"Not page with id = $id");
        }else{
            $model = new CostFloat;
        }
        if(isset($_POST['ajax']) && $_POST['ajax']==='create-cost-float-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['CostFloat'])){
            $model->attributes = $_POST['CostFloat'];
            if($model->validate()){
                $model->save();
                Yii::app()->user->setFlash('status', "Data saved!");
                $this->refresh();
            }
        }

        $place_model= Place::model()->findAll();
        $place = [];
        foreach($place_model as $k=>$v){
            $place[$v->id] = $v->name;
        }

        $this->render('cost_float',['model'=>$model,'place'=>$place]);
    }
	public function actionBindPlace($id = null)
	{
        if(($id != null)&&(((int)$id) > 0)){
            $model = Employee2place::model()->findByPk((int)$id);
            if($model == null)
                throw new CHttpException(404,"Not page with id = $id");
        }else{
            $model = new Employee2place;
        }
        if(isset($_POST['ajax']) && $_POST['ajax']==='create-bind-place-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Employee2place'])){
            $model->attributes = $_POST['Employee2place'];
            if($model->validate()){
                $model->save();
                Yii::app()->user->setFlash('status', "Data saved!");
                $this->refresh();
            }
        }

        $place_model= Place::model()->findAll();
        $place = [];
        foreach($place_model as $k=>$v){
            $place[$v->id] = $v->name;
        }

        $employee_model = Employee::model()->findAll();
        $employee = [];
        foreach($employee_model as $k=>$v){
            $employee[$v->id] = $v->first_name.' '.$v->last_name;
        }

		$this->render('bind_place',['model'=>$model,'place'=>$place,'employee'=>$employee]);
	}

    //Its method apply in remote connections with desctop application. It have to move to fit class
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