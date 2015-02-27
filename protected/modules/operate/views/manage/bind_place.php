<?php
$this->pageTitle=Yii::app()->name . ' - Create Bind';
?>

<h1>Place</h1>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'create-bind-place-form',
        'enableAjaxValidation'=>true,
    )); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'id_place'); ?>
        <?php echo $form->dropDownList($model,'id_place',$place); ?>
        <?php echo $form->error($model,'id_place'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'id_employee'); ?>
        <?php echo $form->dropDownList($model,'id_employee',$employee); ?>
        <?php echo $form->error($model,'id_employee'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelex($model,'cost'); ?>
        <?php echo $form->textfield($model,'cost'); ?>
        <?php echo $form->error($model,'cost'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelex($model,'salary_at_hour'); ?>
        <?php echo $form->textfield($model,'salary_at_hour'); ?>
        <?php echo $form->error($model,'salary_at_hour'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'salary_rate'); ?>
        <?php echo $form->textField($model,'salary_rate'); ?>
        <?php echo $form->error($model,'salary_rate'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'salary_at_shift'); ?>
        <?php echo $form->textField($model,'salary_at_shift'); ?>
        <?php echo $form->error($model,'salary_at_shift'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'shift_work'); ?>
        <?php echo $form->textField($model,'shift_work'); ?>
        <?php echo $form->error($model,'shift_work'); ?>
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