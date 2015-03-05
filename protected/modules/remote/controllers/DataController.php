<?php

class DataController extends Controller
{
    public $last_active = null;
	public function actionLoginEmployee($id_place)
	{
        $employee = Employee2place::model()->findAllByAttributes(["id_place"=>$id_place]);
        $stdClass = new stdClass();
        foreach($employee as $v){
            $stdClass->email[] = Employee::model()->findByPk($v->id_employee)->email;
            $stdClass->id_bind[] = $v->id;
        }
        echo json_encode($stdClass);
	}

    public function actionGetLastActive($id_bind){
        $bind_model = Employee2place::model()->findByPk($id_bind);
        echo $bind_model->last_active;
    }

    public function actionSetSession($id_bind,$json = '{"0":{"ts":"1425122091","action":"start"},"1":{"ts":"1425121991","action":"start"}}',$type = 'play'){
        $val = json_decode($json);
        //print_r(json_decode($val[0]));
        //exit;
        $ts_now = time();
        $ts_today = mktime(0, 0, 0, date("m",$ts_now), date("d",$ts_now), date("Y",$ts_now));
        if($type == "employee")
            $db_object = SessionEmployee::model()->findAll('id_bind=:id_bind AND ts >= :today', array(':id_bind'=>$id_bind,':today'=>$ts_today));
        else
            $db_object = Play::model()->findAll('id_bind=:id_bind AND ts >= :today', array(':id_bind'=>$id_bind,':today'=>$ts_today));

        $ts_array = $this->propToArray($db_object,"ts");
        foreach($val as $v){
            $v1 = json_decode($v);
            if(!in_array((string)$v1->ts,$ts_array)){
                if($type == 'employee'){
                    $this->setSingleSessionEmployee($id_bind,$v1);
                }else if($type == 'play'){
                     $this->setSinglePlay($id_bind,$v1);
                }
            }
        }

        if($this->last_active !== null){
            $bind_model = Employee2place::model()->findByPk($id_bind);
            $bind_model->last_active = $this->last_active;
            $bind_model->save(false);
        }
    }

    private function propToArray($obj,$name){
        $newArray = [];
        foreach($obj as $v){
            if(isset($v->$name))
                $newArray[] = $v->$name;
        }
        return $newArray;
    }

    private function setSingleSessionEmployee($id_bind,$o){
        $model = new SessionEmployee();
        $model->id_bind = (int)$id_bind;
        $model->ts = (int)$o->ts;
        $model->action = $o->action;
        if($model->save(true)){
            $this->last_active = (int)$o->ts;
            echo $this->last_active;
            return true;
        }else{
            return false;
        }
    }

    private function setSinglePlay($id_bind,$obj){
        $model = new Play();
        $model->id_bind = (int)$id_bind;
        $model->ts = (int)$obj->ts;
        $model->duration = (int)$obj->duration;
        $model->id_game = (int)$obj->id_game;
        if($model->save(true)){
            $this->last_active = (int)$obj->ts;
            echo $this->last_active;
            return true;
        }else{
            return false;
        }
    }
}