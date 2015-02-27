<?php
$this->pageTitle=Yii::app()->name . ' - Create Place';
?>

<h1>Place</h1>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'create-place-form',
        'enableAjaxValidation'=>true,
    )); ?>
    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name'); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'address'); ?>
        <?php echo $form->textArea($model,'address'); ?>
        <?php echo $form->error($model,'address'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textArea($model,'description'); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'id_city'); ?>
        <?php echo $form->dropDownList($model,'id_city',$city); ?>
        <?php echo $form->error($model,'id_city'); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Create'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->