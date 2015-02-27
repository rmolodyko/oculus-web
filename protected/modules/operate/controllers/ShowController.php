<?php

class ShowController extends Controller
{
    public $layout = 'menu';
    public $count = 0;

    public function actionCountry()
    {
        $dataProvider=new CActiveDataProvider('Country', array(
            'pagination'=>array(
                'pageSize'=>20,
            ),
        ));
        $this->render('grid',['itemView'=>'country','dataProvider'=>$dataProvider]);
    }

    public function actionCity($id_country = null)
    {
        $cond = [];
        if($id_country != null){
           $cond['criteria'] = [
               'condition'=>"id_country = :id_country",
               'params'=>array(':id_country'=>$id_country),
           ];
        }
        $dataProvider=new CActiveDataProvider('City',array_merge(array(
            'pagination'=>array(
                'pageSize'=>20,
            )),$cond)
        );
        $this->render('grid',['itemView'=>'city','dataProvider'=>$dataProvider]);
    }

    public function actionPlace($id_city = null)
    {
        $cond = [];
        if($id_city != null){
            $cond['criteria'] = [
                'condition'=>"id_city = :id_city",
                'params'=>array(':id_city'=>$id_city),
            ];
        }
        $dataProvider=new CActiveDataProvider('Place',array_merge(array(
                'pagination'=>array(
                    'pageSize'=>20,
                )),$cond)
        );
        $this->render('grid',['itemView'=>'place','dataProvider'=>$dataProvider]);
    }


    public function actionEmployee()
    {
        $cond = [];
        $dataProvider=new CActiveDataProvider('Employee',array_merge(array(
                'pagination'=>array(
                    'pageSize'=>20,
                )),$cond)
        );
        $this->render('grid',['itemView'=>'employee','dataProvider'=>$dataProvider]);
    }


    public function actionGame()
    {
        $cond = [];
        $dataProvider=new CActiveDataProvider('Game',array_merge(array(
                'pagination'=>array(
                    'pageSize'=>20,
                )),$cond)
        );
        $this->render('grid',['itemView'=>'game','dataProvider'=>$dataProvider]);
    }

    public function actionBindPlace()
    {
        $cond = [];
        $dataProvider=new CActiveDataProvider('Employee2place',array_merge(array(
                'pagination'=>array(
                    'pageSize'=>20,
                )),$cond)
        );
        $this->render('grid',['itemView'=>'bind_place','dataProvider'=>$dataProvider]);
    }


    public function actionCostFloat()
    {
        $cond = [];
        $dataProvider=new CActiveDataProvider('CostFloat',array_merge(array(
                'pagination'=>array(
                    'pageSize'=>20,
                )),$cond)
        );
        $this->render('grid',['itemView'=>'cost_float','dataProvider'=>$dataProvider]);
    }
}