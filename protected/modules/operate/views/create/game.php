<?php
$this->pageTitle=Yii::app()->name . ' - Create Game';
?>

<h1>Game</h1>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'create-game-form',
        'enableAjaxValidation'=>true,
    )); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name'); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'duration'); ?>
        <?php echo $form->textField($model,'duration'); ?>
        <?php echo $form->error($model,'duration'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'version'); ?>
        <?php echo $form->textField($model,'version'); ?>
        <?php echo $form->error($model,'version'); ?>
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