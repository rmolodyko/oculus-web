<?php
$this->pageTitle=Yii::app()->name . ' - Create City';
?>

<h1>City</h1>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'create-city-form',
        'enableAjaxValidation'=>true,
    )); ?>
    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name'); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textArea($model,'description'); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'id_country'); ?>
        <?php echo $form->dropDownList($model,'id_country',$country); ?>
        <?php echo $form->error($model,'id_country'); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Create'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->