<?php
//Добавление ресурсов (модулей)
//http://appossum.com/appsite/techdetail/yii-resources
/*
 * Использовать:
 * //Если нужно зарание подключить jquery
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerPackage('magicsuggest');
 *
 * Here is the list of available core scripts:
    jquery
    jquery.ui
    yii
    yiitab
    yiiactiveform
    bgiframe
    ajaxqueue
    autocomplete
    Подключение с помощю Yii::app()->clientScript->registerCoreScript('jquery');
 *
*/
return array(
    //Подключение модулей
    'chained' => array(
        'baseUrl'=>'public/module/chained',
        'js'=>array('jquery.chained.min.js','jquery.chained.remote.min.js'),
    ),
    'chart' => array(
        'baseUrl'=>'public/module/chart',
        'js'=>array('chart.js'),
    ),
    'jquery-form' => array(
        'baseUrl'=>'public/module/jquery-form',
        'js'=>array('jquery.form.js'),
    ),
    /*
     * Подключение ресурсов к модуля/контроллера
     * Нотация названия пакета module.controller.action
    */
    /*'profile.edit' => array(
        'baseUrl'=>'public/assets/profile',
        //'js'=>array('js/myXMPP.js'),
        'css'=>array('css/file.css','css/tape.css','css/description.css'),
    ),*/
);