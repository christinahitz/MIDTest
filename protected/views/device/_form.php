<?php
/* @var $this DeviceController */
/* @var $model Device */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'device-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'deviceID'); ?>
		<?php echo $form->textField($model,'deviceID'); ?>
		<?php echo $form->error($model,'deviceID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'serialNum'); ?>
		<?php echo $form->textField($model,'serialNum',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'serialNum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastCal'); ?>
		<?php echo $form->textField($model,'lastCal'); ?>
		<?php echo $form->error($model,'lastCal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastServ'); ?>
		<?php echo $form->textField($model,'lastServ'); ?>
		<?php echo $form->error($model,'lastServ'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastDraegerServ'); ?>
		<?php echo $form->textField($model,'lastDraegerServ'); ?>
		<?php echo $form->error($model,'lastDraegerServ'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'leased'); ?>
		<?php echo $form->textField($model,'leased'); ?>
		<?php echo $form->error($model,'leased'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'locationID'); ?>
		<?php echo $form->textField($model,'locationID'); ?>
		<?php echo $form->error($model,'locationID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->