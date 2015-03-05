<?php

class Format
{

    static public function getConfigChartTime($type){
        $dateTimeNow = new DateTime();
        $yearNow = $dateTimeNow->format("Y");
        $monthNow = $dateTimeNow->format("m");
        $dayNow = $dateTimeNow->format("d");
        $time = [
            'start'=>[
                'year'=>$yearNow.'-01-01',
                'month'=>$yearNow.'-'.$monthNow.'-01',
                'day'=>$yearNow.'-'.$monthNow.'-'.$dayNow,
            ],
            'interval'=>[
                'year'=>'P1M',
                'month'=>'P1D',
                'day'=>'PT1H',
            ],
            'upto'=>[
                'year'=>12,
                'month'=>cal_days_in_month(CAL_GREGORIAN, $monthNow, $yearNow),
                'day'=>24,
            ]
        ];
        //return $time;
        return ['start'=>new DateTime($time['start'][$type]),'interval'=>new DateInterval($time['interval'][$type]),'upto'=>$time['upto'][$type]];
    }

    static public function getIdPlayForSite($id,$type = "country")
    {
        if(!(int)$id) throw new CException("Error with id");
        $id_site_parent = $id;
        switch($type){
            case "country":{
                $parent = City::model()->findAllByAttributes(["id_country"=>$id_site_parent]);
                $id_array = [];
                foreach($parent as $v){
                    $id_array = array_merge($id_array,self::getIdPlayForSite($v->id,"city"));
                }
                return $id_array;
                break;
            }
            case "city":{
                $parent = Place::model()->findAllByAttributes(["id_city"=>$id_site_parent]);
                $id_array = [];
                foreach($parent as $v){
                    $id_array = array_merge($id_array,self::getIdPlayForSite($v->id,"place"));
                }
                return $id_array;
                break;
            }
            case "place":{
                $parent = Employee2place::model()->findAllByAttributes(["id_place"=>$id_site_parent]);
                $id_array = [];
                foreach($parent as $v){
                    $id_array[] = $v->id;
                }
                return $id_array;
                break;
            }
            case "employee":{
                $parent = Employee2place::model()->findAllByAttributes(["id_employee"=>$id_site_parent]);
                $id_array = [];
                foreach($parent as $v){
                    $id_array[] = $v->id;
                }
                return $id_array;
                break;
            }
            case "game":{
                $parent = Game::model()->findAll();
                $id_array = [];
                foreach($parent as $v){
                    $id_array[] = $v->id;
                }
                return $id_array;
                break;
            }
        }
        throw new CException("Incorrect type");
    }

    static public function getIdPlayForTime($idBind,$timeObj){
        $dateTime = $timeObj['start'];
        $interval = $timeObj['interval'];
        $count = $timeObj['upto'];
        if(!is_int($idBind)){//Select rows for "bind"
            $inOperator = implode("','",$idBind);
            $sql_first = "id_bind IN ('$inOperator') AND";
        }else{//Select rows for "game"
            $sql_first = "id_game > 0 AND";
        }
        $res = [];
        for($i = 1; $i<=$count; $i++){
            $res[$i] = [];
            $tLeft = $dateTime->getTimestamp();
            $dateTime->add($interval);
            $tRight = $dateTime->getTimestamp();
            $objs = Play::model()->findAll($sql_first." ts < :tr AND ts > :tl",[":tr"=>$tRight,":tl"=>$tLeft]);
            foreach($objs as $v){
                $res[$i][] = $v->id;
            }
        }
        return $res;
    }

    static public function getAmount($idBind){
        $common_cost = (int)Common::model()->findByAttributes(['key'=>'cost_common'])->val;
        foreach($idBind as $k=>$v){
            $inOperator = implode("','",$v);
            $tmp = 0;
            $objs = Play::model()->findAll("id IN ('$inOperator')");
            foreach($objs as $item){
                $cost_obj = Employee2place::model()->findByPk($item->id_bind);
                if((int)$cost_obj->cost)
                    $tmp += (int)$cost_obj->cost;
                else
                    $tmp += $common_cost;
            }
            $idBind[$k] = $tmp;
        }
        return $idBind;
    }

    static public function getGamesCount($idBind){
        $new = [];
        foreach($idBind as $k=>$v){
            $new[$k] = count($v);
        }
        return $new;
    }

}

