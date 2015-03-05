<?php

class ShowController extends Controller
{
    public $layout = 'main';
    public $separatorForChainedSelect = "--- Not selected ---";

    public function actionGame($time = "year")
    {
        $chain = 'country';
        $idchain = 21;
        $this->getPanelOperate($idchain,$chain,"game");
    }

	public function actionIndex($time = "year")
	{
        $chain = 'country';
        $idchain = 21;
        $this->getPanelOperate($idchain,$chain,"amount");
	}

    public function actionAjaxGetChart(){
        $chain = 'country';
        $idchain = 21;
        $time = "year";
        $type = 'amount';
        if(isset($_GET["country"])&&($_GET["country"])){
            $chain = 'country';
            $idchain = $_GET["country"];
        }
        if(isset($_GET["city"])&&($_GET["city"])){
            $chain = 'city';
            $idchain = $_GET["city"];
        }
        if(isset($_GET['place'])&&($_GET["place"])){
            $chain = 'place';
            $idchain = $_GET["place"];
        }
        if(isset($_GET['time'])&&($_GET['time'])){
            $time = $_GET['time'];
        }
        if(isset($_GET['type'])&&($_GET['type'])){
            $type = $_GET['type'];
        }

        $chart = $this->getChart($chain,$idchain,$time,$type);
        echo $chart;
    }

    public function getChart($chain,$idchain,$time,$type){
        /*if($type == 'game'){
            $timeId = Format::getIdPlayForTime(0,Format::getConfigChartTime($time));
        }else{*/
            $siteId = Format::getIdPlayForSite($idchain,$chain);
            $timeId = Format::getIdPlayForTime($siteId,Format::getConfigChartTime($time));
        //}
        if($type == "amount"){
            $o = Format::getAmount($timeId);
            $new_o = [];
            foreach($o as $k=>$v){
                $new_o[] = ["$k",$v,'silver'];
            }
        }
        if($type == "game"){
            $o = Format::getGamesCount($timeId);
            $max = max($o);
            $new_o = [];
            foreach($o as $k=>$v){
                if(isset($_GET['percent'])&&($_GET['percent'])){
                    $v1 = ($v/$max)*100;
                }else{
                    $v1 = $v;
                }

                $new_o[] = ["$k",$v1,'silver'];
            }
        }

        echo json_encode($new_o);
    }

    public function getPanelOperate($id,$chain,$type){
        $data = [];
        if($chain == "country")
            $data['country'] = Country::model()->findAll();
        if($type == "amount")
            $this->render('amount_operate',$data);
        if($type == "game")
            $this->render('game_operate',$data);
    }

    public function actionGetChainedList(){
        $res = [''=>$this->separatorForChainedSelect];
        if(isset($_GET['country'])){
            $o = City::model()->findAllByAttributes(['id_country'=>(int)$_GET['country']]);
            foreach($o as $v){
                $res[$v->id] = $v->name;
            }
            die(json_encode($res));
        }
        if(isset($_GET['city'])){
            $o = Place::model()->findAllByAttributes(['id_city'=>(int)$_GET['city']]);
            foreach($o as $v){
                $res[$v->id] = $v->name;
            }
            die(json_encode($res));
        }
    }
}