<?php
/* @var $this DeviceController */
/* @var $model Device */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'deviceID'); ?>
		<?php echo $form->textField($model,'deviceID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serialNum'); ?>
		<?php echo $form->textField($model,'serialNum',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastCal'); ?>
		<?php echo $form->textField($model,'lastCal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastServ'); ?>
		<?php echo $form->textField($model,'lastServ'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastDraegerServ'); ?>
		<?php echo $form->textField($model,'lastDraegerServ'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'leased'); ?>
		<?php echo $form->textField($model,'leased'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locationID'); ?>
		<?php echo $form->textField($model,'locationID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->