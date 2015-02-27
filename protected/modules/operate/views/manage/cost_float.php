<?php
$this->pageTitle=Yii::app()->name . ' - Create Bind';
?>

<h1>Cost Float</h1>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'create-cost-float-form',
        'enableAjaxValidation'=>true,
    )); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'id_place'); ?>
        <?php echo $form->dropDownList($model,'id_place',$place); ?>
        <?php echo $form->error($model,'id_place'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelex($model,'cost'); ?>
        <?php echo $form->textfield($model,'cost'); ?>
        <?php echo $form->error($model,'cost'); ?>
    </div>
<!--
    <div class="row">
        <?php echo $form->labelex($model,'time_start'); ?>
        <?php echo $form->textfield($model,'time_start'); ?>
        <?php echo $form->error($model,'time_start'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'time_finish'); ?>
        <?php echo $form->textField($model,'time_finish'); ?>
        <?php echo $form->error($model,'time_finish'); ?>
    </div>
-->

    <div class="row">
        <?php echo $form->labelEx($model,'day'); ?>
        <?php echo $form->dropDownList($model,'day',CostFloat::$dayValue); ?>
        <?php echo $form->error($model,'day'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textArea($model,'description'); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Create'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->